<?php

namespace App\Http\Controllers;
use App\Models\NhanSu;
use PhpOffice\PhpWord\PhpWord;
use App\Models\Notification;

use PhpOffice\PhpWord\IOFactory;
use Illuminate\Http\Request;
use App\Models\Certificate; // Thêm dòng này để import class Certificate
use App\Models\Education; // Thêm dòng này để import class Certificate
use App\Models\Status;
class CertificateController extends Controller
{
    public function ChungChiNhanSu()
{
    $nhansu = auth()->user()->nhansu;
    // Lấy thông tin nhân sự dựa vào user_id của người dùng hiện tại
    //$nhansu = Nhansu::where('user_id', auth()->id())->first();

    if (!$nhansu) {
        return redirect()->back()->with('error', 'Không tìm thấy thông tin nhân sự.');
    }
    // Lấy danh sách chứng chỉ và học vấn của nhân sự đó
    $certificates = Certificate::where('nhansu_id', $nhansu->id)->paginate(10);

    return view('certificates.chungchinhansu', compact('certificates', 'nhansu'));
}
    public function exportCertificateToWord($id)
    {
        $certificate = Certificate::with('nhansu')->findOrFail($id);
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
    
        // Tiêu đề
        $titleStyle = ['bold' => true, 'size' => 16];
        $paragraphCenter = ['alignment' => 'center'];
        $section->addText("THÔNG TIN CHỨNG CHỈ", $titleStyle, $paragraphCenter);
        $section->addTextBreak(2);
    
        // Định dạng bảng
        $tableStyle = ['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80];
        $phpWord->addTableStyle('CertificateTable', $tableStyle);
        $table = $section->addTable('CertificateTable');
    
        // Hàm thêm dòng
        function addRow($table, $label, $value) {
            $table->addRow();
            $table->addCell(4000)->addText($label, ['bold' => true]);
            $table->addCell(8000)->addText($value);
        }
    
        // Thêm dữ liệu vào bảng
        addRow($table, "Họ tên nhân sự", $certificate->nhansu ? $certificate->nhansu->hoten : 'N/A');
        addRow($table, "ID", $certificate->id);
        addRow($table, "Trạng thái", ($certificate->status_id == 1 ? 'Hợp lệ' : 'Không hợp lệ'));
        addRow($table, "Ngày cấp", date('d/m/Y', strtotime($certificate->DateStart)));
        addRow($table, "Ngày hết hạn", date('d/m/Y', strtotime($certificate->DateEnd)));
        addRow($table, "Tên chứng chỉ", $certificate->DegreeCertificate);
        addRow($table, "Loại chứng chỉ", $certificate->TypeCertificate);
        addRow($table, "Cơ sở đào tạo", $certificate->BasisTrain);
        addRow($table, "Địa điểm đào tạo", $certificate->LocationTrain);
        addRow($table, "Xếp loại", $certificate->Classification);
        addRow($table, "Điểm số", $certificate->Score);
        addRow($table, "Gửi đi học", $certificate->SentStudy ? "Có" : "Không");
        addRow($table, "Chứng chỉ quốc tế", $certificate->InternationalCertificate ? "Có" : "Không");
        addRow($table, "Ngày tạo", date('d/m/Y H:i', strtotime($certificate->created_at)));
        addRow($table, "Ngày cập nhật", date('d/m/Y H:i', strtotime($certificate->updated_at)));
    
        // Hiển thị file đính kèm nếu có
        if ($certificate->File) {
            $filePath = public_path($certificate->File);
    
            if (file_exists($filePath)) {
                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
    
                // Nếu là ảnh (JPG, JPEG, PNG), thêm vào file Word
                if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png'])) {
                    $section->addTextBreak(1);
                    $section->addText("Hình ảnh chứng chỉ:", ['bold' => true], $paragraphCenter);
                    $section->addImage($filePath, [
                        'width' => 400,
                        'height' => 300,
                        'alignment' => 'center'
                    ]);
                } else {
                    // Nếu là file PDF hoặc khác, chỉ hiện đường dẫn
                    addRow($table, "File đính kèm", asset($certificate->File));
                }
            } else {
                addRow($table, "File đính kèm", "Không tìm thấy file.");
            }
        }
    
        // Tạo file Word
        $fileName = "certificate_{$certificate->id}.docx";
        $tempFile = storage_path($fileName);
    
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);
    
        return response()->download($tempFile)->deleteFileAfterSend(true);
    }


    /**
     * Display a listing of the resource.
     *///$educations = Education::orderBy('created_at', 'desc')->paginate(10);
    public function index()
{
    $certificates = Certificate::with('status')->paginate(10);
    return view('certificates.index', compact('certificates'));
}

public function create()
    {
            $filePath = public_path('certificates_data.json');

        if (!file_exists($filePath)) {
            return back()->with('error', 'File dữ liệu không tồn tại.');
        }

        $data = json_decode(file_get_contents($filePath), true);

        // Kiểm tra nếu dữ liệu null
        if ($data === null) {
            return back()->with('error', 'Lỗi khi đọc dữ liệu từ JSON.');
        }

        // Lấy danh sách địa điểm đào tạo từ JSON
        $locations = $data['locations'] ?? [];
        $levels = $data['levels'] ?? [];
        $nhansu = NhanSu::all(); // Lấy danh sách nhân sự
        return view('certificates.create', compact('nhansu','locations','levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nhansu_id' => 'required|exists:nhansu,id',
            'status_id' => 'required|integer',
            'DateStart' => 'nullable|date',
            'DateEnd' => 'nullable|date',
            'DegreeCertificate' => 'required|string|max:255',
            'TypeCertificate' => 'required|string|max:255',
            'FieldCertificate' => 'required|string|max:255',
            'LevelCertificate' => 'required|string|max:255',
            'BasisTrain' => 'nullable|string|max:255',
            'LocationTrain' => 'nullable|string|max:255',
            'Classification' => 'nullable|string|max:255',
            'Score' => 'nullable|numeric',
            'SentStudy' => 'boolean',
            'InternationalCertificate' => 'boolean',
            'DateCertificate' => 'nullable|date',
            'File' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // Giới hạn 2MB
        ]);

        $filePath = null; // Mặc định là không có file

            if ($request->hasFile('File')) {
                $file = $request->file('File');
                $fileName = time() . '_' . $file->getClientOriginalName(); // Đặt tên file duy nhất
                
                // Đường dẫn thư mục lưu file
                $destinationPath = public_path('uploads/certificates');
                
                // Kiểm tra và tạo thư mục nếu chưa tồn tại
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                
                // Lưu file vào thư mục public/uploads/educations/
                $file->move($destinationPath, $fileName);
                
                // Lưu đường dẫn file vào database (chỉ lưu từ 'uploads/educations/...', không lưu cả ổ đĩa)
                $filePath = 'uploads/certificates/' . $fileName;
            }
        // Lưu vào database
        Certificate::create([
            'nhansu_id' => $request->nhansu_id,
            'status_id' => $request->status_id,
            'DateStart' => $request->DateStart,
            'DateEnd' => $request->DateEnd,
            'DegreeCertificate' => $request->DegreeCertificate,
            'TypeCertificate' => $request->TypeCertificate,
            'FieldCertificate' => $request->FieldCertificate,
            'LevelCertificate' => $request->LevelCertificate,
            'BasisTrain' => $request->BasisTrain,
            'LocationTrain' => $request->LocationTrain,
            'Classification' => $request->Classification,
            'Score' => $request->Score,
            'SentStudy' => $request->SentStudy ?? 0,
            'InternationalCertificate' => $request->InternationalCertificate ?? 0,
            'DateCertificate' => $request->DateCertificate,
            'File' => $filePath,
        ]);

        return redirect()->route('certificates.index')->with('success', 'Chứng chỉ đã được tạo thành công.');
    }

    public function edit($id)
    {
        
        $certificate = Certificate::with('nhansu')->findOrFail($id);
        //$certificate = Certificate::findOrFail($id);
        $notifications = Notification::where('is_read', 0)->get();
        return view('certificates.edit', compact('certificate', 'notifications'));
    }

public function update(Request $request, $id)
{
    $certificate = Certificate::findOrFail($id);

    $data = $request->except(['_token', '_method']);

    // Xử lý upload file chứng chỉ nếu có
    if ($request->hasFile('File')) {
        $file = $request->file('File');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = 'uploads/certificates/' . $fileName;

        // Lưu file vào thư mục public/uploads/certificates
        $file->move(public_path('uploads/certificates'), $fileName);

        // Cập nhật đường dẫn file trong database
        $data['File'] = $filePath;
    }

    $certificate->update($data);

    return redirect()->route('certificates.index')->with('success', 'Cập nhật chứng chỉ thành công!');
}

public function destroy(Certificate $certificate)
{
    $certificate->delete();
    return redirect()->route('certificates.index')->with('success', 'Xóa thành công');
}
public function show($id)
    {
        $certificate = Certificate::with('status')->findOrFail($id);
        $nhansu = $certificate->nhansu; // Kiểm tra xem có quan hệ không
        
        return view('certificates.show', compact('certificate', 'nhansu'));
    }
}
