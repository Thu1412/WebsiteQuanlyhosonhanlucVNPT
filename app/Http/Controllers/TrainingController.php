<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller; // Đảm bảo dòng này có trong file
use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\NhanSu;  
use App\Models\Status;
use App\Models\Training; 
//use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function DaoTaoNhanSu()
    {
        $nhansu = auth()->user()->nhansu;
        if (!$nhansu) {
            return redirect()->back()->with('error', 'Không tìm thấy nhân sự.');
        }

        $trainings = Training::where('nhansu_id', $nhansu->id)->with('status')->get();

        return view('trainings.daotaonhansu', compact('trainings', 'nhansu'));
    }//$educations = Education::orderBy('created_at', 'desc')->paginate(10);






    public function index()
    {
        $trainings = Training::paginate(5);
        return view('trainings.index', compact('trainings'));
    }

    public function create()
    {
        $nhansu = NhanSu::all(); // Lấy tất cả nhân sự
        $status = Status::all(); // Lấy tất cả trạng thái

        return view('trainings.create', compact('nhansu', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_id' => 'required|integer',
            'DateStart' => 'required|date',
            'DateEnd' => 'required|date',
            'Unit' => 'required|string|max:255',
            'JobTitle' => 'required|string|max:255',
            'CourseTrain' => 'nullable|string|max:255',
            'OrganizeForm' => 'nullable|string|max:255',
            'UnitTrain' => 'nullable|string|max:255',
            'ContentCommit' => 'nullable|string',
            'ResultTrain' => 'nullable|string',
            'ResultSubject' => 'nullable|string',
            'Status' => 'nullable|string',
            'Score' => 'nullable|integer',
            'CostTrain' => 'nullable|numeric',
            'TimeCommit' => 'nullable|integer',
            'TimeCommitRemain' => 'nullable|integer',
            'IssueCertificate' => 'nullable|boolean',
            'Contract' => 'nullable|string',
            'nhansu_id' => 'required|exists:nhansu,id',
        ]);

        // Lưu khóa đào tạo
        $training = Training::create($request->all());

        // Nếu khóa đào tạo cấp chứng chỉ, tạo chứng chỉ mới
        if ($training->IssueCertificate) {
            Certificate::create([
                'nhansu_id' => $training->nhansu_id,
                'status_id' => $training->status_id,
                'DateStart' => $training->DateStart,
                'DateEnd' => $training->DateEnd,
                'DegreeCertificate' => 'Chứng chỉ đào tạo: ' . $training->CourseTrain,
                'TypeCertificate' => 'Chuyên môn',
                'FieldCertificate' => $training->CourseTrain,
                'LevelCertificate' => 'Nâng cao',
                'BasisTrain' => $training->UnitTrain,
                'LocationTrain' => 'Không xác định',
                'Classification' => 'Đạt',
                'Score' => $training->Score,
                'SentStudy' => 1,
                'InternationalCertificate' => 0,
            ]);
        }

        return redirect()->route('trainings.index')->with('success', 'Thêm khóa đào tạo thành công');
    }
    public function show(Training $training)
    {
        //$training = Training::findOrFail($id); // Tìm khóa đào tạo
        $nhansu = $training->nhansu; // Lấy thông tin nhân sự từ mối quan hệ

        return view('trainings.show', compact('training', 'nhansu'));
    }
    public function edit(Training $training)
    {
        return view('trainings.edit', compact('training'));
    }
    public function update(Request $request, Training $training)
    {
        $request->validate([
            'status_id' => 'required|integer',
            'DateStart' => 'required|date',
            'DateEnd' => 'required|date',
            'Unit' => 'required|string|max:255',
            'JobTitle' => 'required|string|max:255',
            'CourseTrain' => 'nullable|string|max:255',
            'OrganizeForm' => 'nullable|string|max:255',
            'UnitTrain' => 'nullable|string|max:255',
            'ContentCommit' => 'nullable|string',
            'ResultTrain' => 'nullable|string',
            'ResultSubject' => 'nullable|string',
            'Status' => 'nullable|string',
            'Score' => 'nullable|integer',
            'CostTrain' => 'nullable|numeric',
            'TimeCommit' => 'nullable|integer',
            'TimeCommitRemain' => 'nullable|integer',
            'IssueCertificate' => 'nullable|boolean',
            'Contract' => 'nullable|string',
            'nhansu_id' => 'required|exists:nhansu,id',
        ]);

        // Cập nhật khóa đào tạo
        $training->update($request->all());

        // Nếu khóa đào tạo cấp chứng chỉ, cập nhật hoặc tạo chứng chỉ mới
        if ($training->IssueCertificate) {
            Certificate::updateOrCreate(
                [
                    'nhansu_id' => $training->nhansu_id,
                    'DateStart' => $training->DateStart,
                    'DateEnd' => $training->DateEnd
                ],
                [
                    'status_id' => $training->status_id,
                    'DegreeCertificate' => 'Chứng chỉ đào tạo: ' . $training->CourseTrain,
                    'TypeCertificate' => 'Chuyên môn',
                    'FieldCertificate' => $training->CourseTrain,
                    'LevelCertificate' => 'Nâng cao',
                    'BasisTrain' => $training->UnitTrain,
                    'LocationTrain' => 'Không xác định',
                    'Classification' => 'Đạt',
                    'Score' => $training->Score,
                    'SentStudy' => 1,
                    'InternationalCertificate' => 0,
                ]
            );
        }

        return redirect()->route('trainings.index')->with('success', 'Cập nhật khóa đào tạo thành công');
    }
}
