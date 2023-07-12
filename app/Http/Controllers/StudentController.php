<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function League\Flysystem\get;

class StudentController extends Controller
{
    //
    public function index() {
        $title = "hello laravel";
        $name = "thanghq12";
        $students = DB::table('students')
            ->select('id', 'name') // lấy theo số trường mà mình mong muốn

            ->get();
        // lấy theo điều kiện và trả về 1 dòng dữ liệu
        $student = DB::table('students')
            ->where('id','=',1)

            ->first();
        // thực hiện truy vấn theo nhiều điều kiện
        $studentCondition = DB::table('students')
            ->where('id','>=',1)
            ->where('id','<',5)// tương đương với toán tử and
            ->orWhere('email','=','hassie96@example.net')
            // tương đương với toán tử or
            ->get();

        $countStudent = DB::table('students')->count();

        //lấy toàn bộ dữ liệu của bảng students tương đương với
        // select * from students
//        dd($students);
        return view('student.index',compact('title','name','students'));
        //tạo 1 route add-student và view add gồm form (input name,email)
    }
    public function add(Request $request) {
        if ($request->isMethod('POST')) { //tồn tại phương thức post
            dd($request->name);
        }
        return view('student.add');
    }
}
