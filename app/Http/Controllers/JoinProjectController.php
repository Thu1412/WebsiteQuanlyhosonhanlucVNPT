<?php

namespace App\Http\Controllers;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\JoinProject;
use App\Models\NhanSu;  
use App\Models\Status;
use Illuminate\Routing\Controller;
class JoinProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ThamGiaDuAnNhanSu()
    {
        $nhansu = auth()->user()->nhansu;
        if (!$nhansu) {
            return redirect()->back()->with('error', 'Không tìm thấy nhân sự.');
        }
 
        $joinProjects = JoinProject::where('nhansu_id', $nhansu->id)->with('status')->get();
        return view('join-projects.thamgiaduannhansu', compact('joinProjects', 'nhansu'));
    }//$educations = Education::orderBy('created_at', 'desc')->paginate(10);
    public function index()
    {
        $joinProjects = JoinProject::with(['user', 'status'])->orderBy('DateStart', 'desc')->paginate(5);
        return view('join-projects.index', compact('joinProjects'));
    }
/*
    // Hiển thị form thêm mới
    public function create()
    {
        $trainings = Training::all(); // Truy vấn danh sách khóa đào tạo
        $nhansu = Nhansu::all(); // Nếu có danh sách nhân sự
        $status = Status::all(); // Nếu có danh sách trạng thái

        return view('join-projects.create', compact('trainings', 'nhansu', 'status'));
    }*/
    public function create()
    {
        $trainings = Training::all();
        $nhansu = Nhansu::all();
        $status = Status::all();
    
        // Lấy danh sách tên sản phẩm đã có
        $productNames = JoinProject::select('ProductName')->distinct()->pluck('ProductName');
    
        return view('join-projects.create', compact('trainings', 'nhansu', 'status', 'productNames'));
    }
    // Lưu thông tin mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'nhansu_id' => 'required|exists:nhansu,id',
            'status_id' => 'required|exists:status,id',
            'DateStart' => 'required|date',
            'DateEnd' => 'required|date|after_or_equal:DateStart',
            'ProductName' => 'required|string|max:255',
            'Description' => 'nullable|string',
        ]);

        JoinProject::create($request->all());
        return redirect()->route('join-projects.index')->with('success', 'Dự án đã được thêm!');
    }

    // Hiển thị form chỉnh sửa
    public function edit(JoinProject $joinProject)
    {
        $nhansu = NhanSu::all();
        $status = Status::all();
        return view('join-projects.edit', compact('joinProject', 'nhansu', 'status'));
    }
    public function show(JoinProject $joinProject)
{
    $nhansu = NhanSu::findOrFail($joinProject->nhansu_id);
    $statusItem = Status::find($joinProject->status_id); // Lấy trạng thái từ bảng Status

    return view('join-projects.show', compact('joinProject', 'nhansu', 'statusItem'));
}

    // Cập nhật thông tin
    public function update(Request $request, JoinProject $joinProject)
    {
        $request->validate([
            'nhansu_id' => 'required|exists:nhansu,id',
            'status_id' => 'required|exists:status,id',
            'DateStart' => 'required|date',
            'DateEnd' => 'required|date|after_or_equal:DateStart',
            'ProductName' => 'required|string|max:255',
            'Description' => 'nullable|string',
        ]);

        $joinProject->update($request->all());
        return redirect()->route('join-projects.index')->with('success', 'Dự án đã được cập nhật!');
    }

    // Xóa dữ liệu
    public function destroy(JoinProject $joinProject)
    {
        $joinProject->delete();
        return redirect()->route('join-projects.index')->with('success', 'Dự án đã được xóa!');
    }
}
