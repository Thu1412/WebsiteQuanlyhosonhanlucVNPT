<?php

namespace App\Http\Controllers;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NhanSu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class EducationController extends Controller
{
    public function HocVanNhanSu()
    {
        // Lấy ID của nhân sự đăng nhập
        $nhansu = auth()->user()->nhansu;

        // Kiểm tra nếu không có nhân sự
        if (!$nhansu) {
            return redirect()->back()->with('error', 'Không tìm thấy nhân sự.');
        }

        // Lấy danh sách học vấn của nhân sự
        $educations = \App\Models\Education::where('nhansu_id', $nhansu->id)->get();

        // Kiểm tra nếu không có dữ liệu
        if ($educations->isEmpty()) {
            return redirect()->back()->with('error', 'Không có thông tin học vấn.');
        }

        return view('educations.hocvannhansu', compact('educations', 'nhansu'));
    }


  
    public function exportToWord($id)
    {
        $education = Education::findOrFail($id);
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Định dạng tiêu đề
        $titleStyle = ['bold' => true, 'size' => 16];
        $paragraphCenter = ['alignment' => 'center']; // Căn giữa
        $section->addText("THÔNG TIN TRÌNH ĐỘ HỌC VẤN", $titleStyle, $paragraphCenter);
        $section->addTextBreak(2); // Xuống dòng

        // Định dạng bảng
        $tableStyle = [
            'borderSize' => 6, 'borderColor' => '000000',
            'cellMargin' => 80
        ];
        $phpWord->addTableStyle('EducationTable', $tableStyle);
        $table = $section->addTable('EducationTable');

        // Định dạng ô tiêu đề
        $headerStyle = ['bold' => true, 'color' => 'FFFFFF'];
        $cellHeaderStyle = ['bgColor' => '007ACC', 'alignment' => 'center'];

        // Thêm hàng tiêu đề
        $table->addRow();
        $table->addCell(4000, $cellHeaderStyle)->addText("Thông tin", $headerStyle, $paragraphCenter);
        $table->addCell(8000, $cellHeaderStyle)->addText("Chi tiết", $headerStyle, $paragraphCenter);

        // Hàm thêm dòng vào bảng
        function addRow($table, $label, $value) {
            $table->addRow();
            $table->addCell(4000)->addText($label, ['bold' => true], ['alignment' => 'center']);
            $table->addCell(8000)->addText($value, [], ['alignment' => 'center']);
        }

        // Thêm thông tin vào bảng
        addRow($table, "Họ tên nhân sự", $education->nhansu->hoten);
        addRow($table, "ID", $education->id);
        addRow($table, "Trạng thái", ($education->status_id == 1 ? 'Đã tốt nghiệp' : ($education->status_id == 2 ? 'Đang học' : 'Bị đình chỉ')));
        addRow($table, "Ngày bắt đầu", date('d/m/Y', strtotime($education->DateStart)));
        addRow($table, "Ngày kết thúc", date('d/m/Y', strtotime($education->DateEnd)));
        addRow($table, "Trường đào tạo", $education->BasisTrain);
        addRow($table, "Chương trình đào tạo", $education->StandardTrain);
        addRow($table, "Ngành đào tạo", $education->FormTrain);
        addRow($table, "Loại đào tạo", $education->TypeTrain);
        addRow($table, "Xếp loại bằng cấp", $education->DegreeClassific);
        addRow($table, "Danh hiệu đào tạo", $education->TitleTrain);
        addRow($table, "Bậc đào tạo", $education->EducationLevel);
        addRow($table, "Gửi đi học", $education->SentStudy ? "Có" : "Không");
        addRow($table, "Ngày tạo", date('d/m/Y H:i', strtotime($education->created_at)));
        addRow($table, "Ngày cập nhật", date('d/m/Y H:i', strtotime($education->updated_at)));

        // Hiển thị file đính kèm nếu có
        if ($education->File) {
            $filePath = public_path($education->File);
            if (file_exists($filePath)) {
                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

                if (in_array($fileExtension, ['jpg', 'jpeg', 'png'])) {
                    $section->addTextBreak(1);
                    $section->addText("Hình ảnh đính kèm:", ['bold' => true], $paragraphCenter);
                    $section->addImage($filePath, [
                        'width' => 400,  
                        'height' => 300,
                        'align' => 'center'
                    ]);
                } else {
                    addRow($table, "File đính kèm", asset($education->File));
                }
            }
        }

        // Tạo file Word
        $fileName = "education_" . $education->id . ".docx";
        $tempFile = storage_path($fileName);
        
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        // Trả file về cho người dùng tải xuống
        return response()->download($tempFile)->deleteFileAfterSend(true);
    }


    public function getUniversitiesFromJson()
    {
        $jsonPath = public_path('universities_data.json'); // Đường dẫn file JSON
    
        if (!file_exists($jsonPath)) {
            return response()->json(['error' => 'File JSON không tồn tại'], 404);
        }
    
        $jsonData = file_get_contents($jsonPath);
        $universities = json_decode($jsonData, true);
    
        if ($universities === null) {
            return response()->json(['error' => 'Lỗi đọc JSON'], 500);
        }
    
        return response()->json($universities);
    } //$educations = Education::orderBy('created_at', 'desc')->paginate(10);
   
    public function index()
    {
        //// $nhansu = NhanSu::all();
        $educations = Education::paginate(10);
        //$educations = Education::paginate(10);
        return view('educations.index', compact('educations'));
       
    }
   
    public function create()
    {
        //return view('educations.create');
        $nhansu = NhanSu::whereNotIn('id', function ($query) {
            $query->select('nhansu_id')->from('educations');
        })->get();

        return view('educations.create', compact('nhansu'));
        //$users = User::where('role', 'user')->get(); // Lọc user có role là 'user'
        
    }

    public function store(Request $request)
    {
        try {
            \Log::info('Dữ liệu nhận được:', $request->all()); //  Ghi log request
            \Log::info('File:', ['file' => $request->file('File')]); 

            $request->validate([
                'DateStart' => 'required|date',
                'DateEnd' => 'required|date|after_or_equal:DateStart',
                'BasisTrain' => 'required|string|max:255',
                'StandardTrain' => 'required|string|max:255',
                'FormTrain' => 'required|string|max:255',
                'TypeTrain' => 'required|string|max:255',
                'File' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            ]);

            $filePath = null; // Mặc định là không có file

            if ($request->hasFile('File')) {
                $file = $request->file('File');
                $fileName = time() . '_' . $file->getClientOriginalName(); // Đặt tên file duy nhất
                
                // Đường dẫn thư mục lưu file
                $destinationPath = public_path('uploads/educations');
                
                // Kiểm tra và tạo thư mục nếu chưa tồn tại
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                
                // Lưu file vào thư mục public/uploads/educations/
                $file->move($destinationPath, $fileName);
                
                // Lưu đường dẫn file vào database (chỉ lưu từ 'uploads/educations/...', không lưu cả ổ đĩa)
                $filePath = 'uploads/educations/' . $fileName;
            }


                $education = new Education();
                $education->nhansu_id = $request->nhansu_id;
                $education->status_id = $request->status_id;
                $education->DateStart = $request->DateStart;
                $education->DateEnd = $request->DateEnd;
                $education->BasisTrain = $request->BasisTrain;
                $education->StandardTrain = $request->StandardTrain;
                $education->FormTrain = $request->FormTrain;
                $education->TypeTrain = $request->TypeTrain;
                $education->DegreeClassific = $request->DegreeClassific;
                $education->TitleTrain = $request->TitleTrain;
                $education->EducationLevel = $request->EducationLevel;
                $education->SentStudy = $request->SentStudy;
                $education->File = $filePath; // Lưu đường dẫn file vào database
                $education->save();

    
            \Log::info('Thêm mới thành công!', ['id' => $education->id]); //  Kiểm tra ID mới

            return redirect()->route('educations.index')->with('success', 'Thêm mới trình độ học vấn thành công!');
            } catch (\Exception $e) {
            \Log::error('Lỗi thêm mới:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }


    public function show(Education $education)
    {
        $nhansu = $education->nhansu;
       // $education = Education::with('nhansu')->findOrFail($id); // findOrFail() cũng hoạt động tương tự

        return view('educations.show', compact('education', 'nhansu'));
    }

    public function edit(Education $education)
    {
        $nhansu = Nhansu::all(); // Lấy danh sách nhân sự từ bảng Nhansu
        return view('educations.edit', compact('education', 'nhansu'));
    }

    public function update(Request $request, Education $education)
    {
        $education->update($request->all());
        if ($request->hasFile('File')) {
            $file = $request->file('File');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('uploads/educations'); // Đường dẫn thư mục lưu
    
            // Đảm bảo thư mục tồn tại
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
    
            // Lưu file vào thư mục
            $file->move($destinationPath, $fileName);
    
            // Lưu đường dẫn file vào database
            $education->File = 'uploads/educations/' . $fileName;
        }
        $education->save();
        return redirect()->route('educations.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('educations.index')->with('success', 'Xóa thành công');
    }
}
