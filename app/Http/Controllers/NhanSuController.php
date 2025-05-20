<?php
namespace App\Http\Controllers; // ✅ Đúng namespace
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\NhanSu;
use Illuminate\Support\Facades\File;

use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
//$educations = Education::orderBy('created_at', 'desc')->paginate(10);
class NhanSuController extends Controller
{
    public function index(): View
    {
        $nhansu = NhanSu::paginate(5);
       // $nhansu = NhanSu::all();
        return view('nhansu.index', compact('nhansu'));
    }
    public function show($id): View
    {
        
        $nhansu = NhanSu::find($id);

    // Kiểm tra nếu không tìm thấy nhân sự
    if (!$nhansu) {
        return redirect()->route('nhansu.index')->with('error', 'Nhân sự không tồn tại!');
    }

    // Trả về view với dữ liệu nhân sự
    return view('nhansu.show', compact('nhansu'));
    }
    public function create(): View
    {
        return view('nhansu.create'); // Trả về trang thêm nhân sự
    }
    public function edit($id): View
    {
        $nhansu = Nhansu::findOrFail($id);
        return view('nhansu.edit', compact('nhansu'));
    }
    public function store(Request $request)
{
    $request->validate([
        'hoten' => 'required|string|max:255',
        'gioitinh' => 'required|string',
        'ngaysinh' => 'required|date',
        'sodienthoai' => 'required|string|max:15|unique:nhansu,sodienthoai',
        'email' => 'required|email|unique:users,email',
        'hinhanh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác.',
        'sodienthoai.unique' => 'Số điện thoại đã tồn tại, vui lòng nhập số khác.',
    ]);

    DB::transaction(function () use ($request) {
        $user = User::create([
            'name' => $request->hoten,
            'email' => $request->email,
            'password' => Hash::make('123'), 
            'plain_password' => $request->password, // Lưu mật khẩu gốc
            'role' => 'user',
        ]);

        $filePath = null;
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/nhansu/' . $fileName;
            $file->move(public_path('uploads/nhansu'), $fileName);
        }

        NhanSu::create([
            'hoten' => $request->hoten,
            'gioitinh' => $request->gioitinh,
            'ngaysinh' => $request->ngaysinh,
            'sodienthoai' => $request->sodienthoai,
            'email' => $request->email,
            'diachi' => $request->diachi,
            'user_id' => $user->id,
            'hinhanh' => $filePath,
        ]);
    });

    return redirect()->route('nhansu.index')->with('success', 'Thêm nhân sự thành công');
}
public function destroy($id)
    {
        // Tìm nhân sự
        $nhansu = NhanSu::find($id);

        if (!$nhansu) {
            return redirect()->route('nhansu.index')->with('error', 'Nhân sự không tồn tại.');
        }

        // Xóa các dữ liệu liên quan đến nhân sự
        // Giả sử nhân sự có liên quan tới các bảng chứng chỉ và học vấn
        $nhansu->certifications()->delete(); // Xóa chứng chỉ liên quan
        $nhansu->educations()->delete(); // Xóa học vấn liên quan

        // Xóa tài khoản người dùng liên quan
        $user = User::find($nhansu->user_id);
        if ($user) {
            $user->delete();
        }

        // Xóa ảnh nhân sự (nếu có)
        if ($nhansu->hinhanh && File::exists(public_path($nhansu->hinhanh))) {
            File::delete(public_path($nhansu->hinhanh)); // Xóa ảnh khỏi thư mục uploads
        }

        // Cuối cùng, xóa nhân sự
        $nhansu->delete();

        // Quay lại danh sách nhân sự với thông báo thành công
        return redirect()->route('nhansu.index')->with('success', 'Xóa nhân sự thành công.');
    }

    /**
     * Danh sách (Grid View)
     */
    protected function grid()
    {
        $grid = new Grid(new NhanSu());

        $grid->column('id', __('ID'));
        $grid->column('hoten', __('Họ tên'));
        $grid->column('gioitinh', __('Giới tính'));
        $grid->column('ngaysinh', __('Ngày sinh'));
        $grid->column('sodienthoai', __('Số điện thoại'));
        $grid->column('hinhanh', __('Hình ảnh'))->image();
        $grid->column('email', __('Email'));
        $grid->column('diachi', __('Địa chỉ'));
        $grid->column('created_at', __('Ngày tạo'));
        $grid->column('updated_at', __('Ngày cập nhật'));

        return $grid;
    }

    public function update(Request $request, $id) {
        $nhansu = NhanSu::findOrFail($id);

        $request->validate([
            'hoten' => 'required|string|max:255',
            'gioitinh' => 'required|string',
            'ngaysinh' => 'required|date',
            'sodienthoai' => 'required|string|max:15|unique:nhansu,sodienthoai,' . $id,
            'email' => 'required|email|unique:users,email,' . $nhansu->user_id,
            'hinhanh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác.',
            'sodienthoai.unique' => 'Số điện thoại đã tồn tại, vui lòng nhập số khác.',
        ]);

    // Xử lý ảnh mới
    if ($request->hasFile('hinhanh')) {
        // Xóa ảnh cũ nếu có
        if ($nhansu->hinhanh && File::exists(public_path($nhansu->hinhanh))) {
            File::delete(public_path($nhansu->hinhanh));
        }

        // Lưu ảnh mới vào thư mục `public/uploads/nhansu/`
        $file = $request->file('hinhanh');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = 'uploads/nhansu/' . $fileName;
        $file->move(public_path('uploads/nhansu'), $fileName);

        $nhansu->hinhanh = $filePath;
    }

    // Cập nhật thông tin khác
    $nhansu->hoten = $request->hoten;
    $nhansu->gioitinh = $request->gioitinh;
    $nhansu->ngaysinh = $request->ngaysinh;
    $nhansu->sodienthoai = $request->sodienthoai;
    $nhansu->email = $request->email;
    $nhansu->diachi = $request->diachi;

    $nhansu->save();

    return redirect()->route('nhansu.index')->with('success', 'Cập nhật nhân sự thành công!');
    }
    protected function detail($id)
    {
        $show = new Show(NhanSu::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('hoten', __('Họ tên'));
        $show->field('gioitinh', __('Giới tính'));
        $show->field('ngaysinh', __('Ngày sinh'));
        $show->field('sodienthoai', __('Số điện thoại'));
        $show->field('hinhanh', __('Hình ảnh'))->image();
        $show->field('email', __('Email'));
        $show->field('diachi', __('Địa chỉ'));
        $show->field('created_at', __('Ngày tạo'));
        $show->field('updated_at', __('Ngày cập nhật'));

        return $show;
    }

    /**
     * Biểu mẫu nhập dữ liệu (Form View)
     */
    protected function form()
    {
        $form = new Form(new NhanSu());

        $form->text('hoten', __('Họ tên'))->required();
        $form->select('gioitinh', __('Giới tính'))->options([
            'Nam' => 'Nam',
            'Nữ' => 'Nữ',
            'Khác' => 'Khác'
        ])->required();
        $form->date('ngaysinh', __('Ngày sinh'))->required();
        $form->mobile('sodienthoai', __('Số điện thoại'))->required();
        $form->image('hinhanh', __('Hình ảnh'))->uniqueName();
        $form->email('email', __('Email'))->required();
        $form->textarea('diachi', __('Địa chỉ'))->required();

        return $form;
    }
}
