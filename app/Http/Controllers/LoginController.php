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
public function index()
    {
        //// $nhansu = NhanSu::all();
        //$educations = Education::paginate(10);
        return view('home.login');
    }
}