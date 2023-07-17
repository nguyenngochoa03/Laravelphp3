<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class AddController extends Controller
{
    public function addstudent(StudentRequest $request){
        // nếu như người dùng ấn nút chuyển post
        if ($request->isMethod('POST')){
           // lấy tất cả các dữ liệu trừ token

            $params = $request ->except("token");
            // nếu tồn tại flie post lên
            if ($request->hasFile('image') && $request->file('image')->isValid()){
                $params['image'] = uploadFile('hinh', $request->file('image'));
            }
            $student = Student::create($params);
            if ($student->id){
                Session::flash('success','Thêm mới thành công sinh viên ');
                return redirect()->route('route_student_add');
            }
        
        return view('student.add');
    }
    public function editstudent(StudentRequest $request,$id){
       // c1 DB queri
//        $student = DB::class('students')
//        ->where ('id','=',$id)
//            ->first();

        //c2 dùng model
        $student = Student::find($id);
        if ($request->isMethod('POST')){
            $result=Session::where('id',$id)
                ->update($request->except('_token'));
            if ($result){
                Session::flash('success','Sửa thành công sinh viên ');
                return redirect()->route('route_student_edit');
            }
            }
        return view('student.edit',compact('student'));
    }
}
