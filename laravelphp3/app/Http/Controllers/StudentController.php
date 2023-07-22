<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

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
            ->select('id', 'name','image')    // lấy dữ liệu trường mong muốn
            ->whereNull('delete_at')
            ->get();
        $studentConditision = DB::table('students')
            ->where('id', '>=',1)
            ->where('id','>=',4)// lấy theo đk id>= 1 và id >= 5
//            ->orWhere('email','=','gjhkjk')// orwwher là hoặc, where là và
        ->get();
        // trả về 1 dòng dữ liệu
        $student = DB::table('students')->get();
//        dd($student);
//        dd($studentConditision);

        return view('student.index', compact("title","name",'student'));
    }

    public function delete($id){
        Student::where('id',$id)->delete();
        Session::flash('suscess','Xoá thành công sinh viên có id là'.$id);
        return redirect()->route('route_student_delete');
    }
}
