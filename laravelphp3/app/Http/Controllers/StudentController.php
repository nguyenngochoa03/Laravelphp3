<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    //
    public function index(Request $request){
        $title = 'hello';
        $name= 'Hoa ntph';
        // khi nào là post
        if ($request ->post() && $request->email){
            // ấn vào thì nhẩy ra post
            $student = DB::table('students')
                ->select('id','name')
                ->where('name','like','%'.$request->email)
                ->get();
        }

        // lấy toàn bộ dữ liệu bảng student
        $student = DB::table('students')
            ->select('id', 'name')    // lấy dữ liệu trường mong muốn
            ->get();
        $studentConditision = DB::table('students')
            ->where('id', '>=',1)
            ->where('id','>=',4)// lấy theo đk id>= 1 và id >= 5
//            ->orWhere('email','=','gjhkjk')// orwwher là hoặc, where là và
        ->get();
        // trả về 1 dòng dữ liệu
        $student = DB::table('students')->where('id','=',1)->get();
//        dd($student);
//        dd($studentConditision);

        return view('student.index', compact("title","name",'student'));
    }
}
