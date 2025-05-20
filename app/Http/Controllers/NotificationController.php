<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        // Lấy tất cả các thông báo chưa đọc
        $notifications = Notification::where('nhansu_id', Auth::user()->nhansu_id)
            ->where('is_read', false)
            ->get();

        return view('notifications.index', compact('notifications'));
    }
    public function markAsRead($id)
    {
        $notification = Notification::find($id);
        if ($notification) {
            $notification->is_read = true;
            $notification->save();
        }
    
        return redirect()->route('notifications.all');
    }
    public function store(Request $request)
    {
        // Validate dữ liệu nhập vào
        $request->validate([
            'type' => 'required|string',
            'message' => 'required|string',
            'nhansu_id' => 'required|integer',
        ]);

        // Lưu thông báo vào database
        Notification::create([
            'sender_id' => auth()->user()->nhansu_id, // Sử dụng nhansu_id của người dùng đang đăng nhập
            'nhansu_id' => $request->nhansu_id,
            'type' => $request->type,
            'message' => $request->message,
            'is_read' => 0, // Thông báo mặc định là chưa đọc
            'is_processed' => 0, // Thông báo chưa xử lý
        ]);

        // Quay lại trang thông báo
        return redirect()->route('notifications.index')->with('success', 'Thông báo đã được gửi thành công!');
    }
    public function showForm($type, $id) {
        return view('nhansu.request_edit', compact('type', 'id'));
    }
    public function viewDetail($id) {
        $notification = Notification::findOrFail($id);
        $notification->is_read = true;
        $notification->save();

        // Chuyển tới trang tương ứng (tuỳ theo type của thông báo)
        if ($notification->type == 'certificate') {
            return redirect()->route('admin.certificates.edit', ['id' => $notification->id]);
        } elseif ($notification->type == 'education') {
            return redirect()->route('admin.educations.edit', ['id' => $notification->id]);
        }

        return back();
    }
    public function respond($id)
    {
        // Lấy thông báo cần xử lý
        $notification = Notification::findOrFail($id);

        // Kiểm tra xem thông báo có nhansu_id không
        if ($notification->nhansu) {
            // Lấy thông tin nhân sự từ nhansu_id
            $nhansu = $notification->nhansu;

            // Tạo thông báo phản hồi cho nhân sự
            $message = "Yêu cầu của bạn về nội dung \"{$notification->message}\" đã được admin xử lý, vui lòng kiểm tra lại thông tin.";
            
            // Sử dụng model Notification để tạo thông báo mới
            Notification::create([
                'sender_id' => 1, // ID admin, bạn có thể thay thế bằng user_id của admin thực tế
                'nhansu_id' => $nhansu->user_id, // Giả sử bạn có bảng users liên kết với nhân sự
                'nhansu_id' => $nhansu->id,
                'type' => 'admin_response',
                'message' => $message,
                'is_read' => false,
            ]);
        }

        // Đánh dấu thông báo đã được xử lý
        $notification->update(['is_read' => true]);

        // Quay lại trang thông báo
        return redirect()->route('notifications.all')->with('success', 'Thông báo đã được xử lý và gửi lại cho nhân sự.');
    }
    public function NhansushowAllNotifications()
    {
        // Lấy tất cả thông báo của nhansu_id đã đăng nhập (Dành cho nhân sự)
        $notifications = Notification::where('nhansu_id', auth()->user()->nhansu_id)
                                      ->latest()
                                      ->get();
        
        // Trả về view riêng biệt cho nhân sự
        return view('notifications.staff_all', compact('notifications'));
    }
    public function redirectToNotification($id)
{
    $notification = Notification::findOrFail($id);
    $notification->update(['is_read' => true]);

    // Redirect đến trang cụ thể của thông báo
    return redirect()->route('notifications.staff_all');
}
public function showAllNotifications(Request $request)
{
    // Lấy thông tin người dùng hiện tại
    $user = auth()->user(); // Hoặc dùng session nếu bạn lưu user trong session

    // Check: Nếu không phải admin thì không cho vào
    if ($user->role !== 'admin') {
        abort(403, 'Chức năng này chỉ dành cho admin.');
    }

    // Lấy $userId từ đối tượng $user (người dùng hiện tại)
    $userId = $user->id; 

    // Truy vấn thông báo dựa trên nhansu_id (user_id)
    $notifications = Notification::where('nhansu_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get();

    // Lấy các thông báo có sender_id khác 1 (admin)
    $notificationsNotSentByAdmin = Notification::where('sender_id', '!=', 1)
        ->orderBy('created_at', 'desc')
        ->get();

    // Lấy các thông báo có sender_id bằng 1 (admin)
    $notificationsSentByAdmin = Notification::where('sender_id', 1)
        ->orderBy('created_at', 'desc')
        ->get();

    // Trả kết quả ra view
    return view('notifications.all', compact('notifications', 'notificationsNotSentByAdmin', 'notificationsSentByAdmin'));
}


public function processNotification($notificationId)
{
    $notification = Notification::findOrFail($notificationId);
    // Thực hiện xử lý thông báo
    $notification->is_processed = true; // Giả sử bạn có cột `is_processed` để đánh dấu thông báo đã xử lý
    $notification->save();

    return redirect()->route('notifications.all')->with('success', 'Thông báo đã được xử lý.');
}

public function deleteNotification($notificationId)
{
    $notification = Notification::findOrFail($notificationId);
    $notification->delete();

    return redirect()->route('notifications.all')->with('success', 'Thông báo đã được xóa.');
}
public function process($id)
{
    $notification = Notification::findOrFail($id);

    // Cập nhật trạng thái thông báo đã xử lý
    $notification->is_read = true;
    $notification->save();

    // Gửi lại 1 thông báo mới tới người gửi (nhân sự tạo yêu cầu)
    Notification::create([
        'nhansu_id' => $notification->nhansu_id, // người gửi gốc
        'message' => 'Yêu cầu của bạn đã được xử lý. Vui lòng kiểm tra lại thông tin.',
        'sender_id' => Auth::id(), // người xử lý (admin)
        'is_read' => false,
    ]);

    return redirect()->back()->with('success', 'Đã xử lý yêu cầu và gửi thông báo lại cho nhân sự.');
}

    public function sendRequest(Request $request) {
        $request->validate([
            'message' => 'required|string|max:1000',
            'type' => 'required|string',
            'id' => 'required|integer',
        ]);

        // Tạo thông báo gửi cho admin
        Notification::create([
            'sender_id' => Auth::id(),
            'nhansu_id' => Auth::user()->nhansu_id,
            'type' => $request->type,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Yêu cầu của bạn đã được gửi đến quản trị viên.');
    }
}
