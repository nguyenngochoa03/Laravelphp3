<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function student(Request $request){
//        return response()->json([[
//            'name'=>'Nguyễn Ngọc Hoa',
//            'diem'=> 10,
//            'tuoi'=>20
//        ],[
//            'name'=>'Nguyễn Ngọc Hoa',
//            'diem'=> 50,
//            'tuoi'=>20
//        ]]);
        // api truyền vào param để seach theo tên
        // validate request API
        $validator = Validator::make($request->all(),[
            'name'=>'required|string',
//            'email'=>'required'
        ]);
        if ($validator->fails()){
            // dùng status của http code
            return response()->json([
//                'status'=>'fails',
                'error'=> $validator->errors()->toArray()
            ],status: 400);
        }

        // viết API hiển thị danh sách sinh viêb theo limit offset (limit offset bắt buộc phải có parram)
        // nếu tồn tại param thì sẽ seach theo tên , nếu tồn tại param email thì seach theo
        //param email nếu tồn tại param name và vừa tồn tại param email thì seach theo cả 2
        //nếu k tồn tại param nào thì chỉ lấy danh sách sinh viên theo limit vÀ OFFSET
//        $dataStudent = Student::where("name", 'like','%'.$request->name.'%')->get() ;
        $query = DB::table('students');
        if ($request->name){
            $query->where('name','LIKE','%'.$request->name.'%');
        }
        if ($request->email){
            $query->where('email','LIKE','%'.$request->email.'%');
        }
        $dataStudent = DB::table('students')
            ->limit($request->limit)
            ->offset($request->offset)
            ->get();
       return response()->json([
//           'status'=>'success',
           'students'=>$dataStudent
       ],status: 200);

       //tự tạo 1 bảng Product id, name, price,color,
        // viết 1 api có tên product truyền lên những param bắt buộc sau offset, limit(validate)
        //truyền 1 param:type
        // nếu như tpe: price
        // bbatws buôck truyền lêm param priceMin, picceMax
        // nếu như type : color
        // bắt buộc truyền lên param color và color này phải lọc được nhiều màu
        // nếu như type:name
        // bắt buộc truyền lên param name và tìm gần đúng theo tên
        // còn nếu không có param type thì thôi lấy s=danh sách sản phẩm theo offset , limit
    }
}
