<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use function League\Flysystem\get;

class StudentController extends Controller
{
    //
    public function index() {

        $title = "hello laravel";
        $name = "thanghq12";
        //c1
        $students = DB::table('students')
            ->select('id', 'name','image') // lấy theo số trường mà mình mong muốn
            ->whereNull('deleted_at')
            ->paginate(5);
        //c2
//        $students = Students::all(); // tự động lấy ra những deleted_at là null
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
    public function add(StudentRequest $request) {
        if ($request->isMethod('POST')) { //tồn tại phương thức post/
            //nếu như tồn tại file thì sẽ up file lên
           $params =  $request->except('_token');
           if ($request->hasFile('image') && $request->file('image')->isValid()) {
               $params['image'] = uploadFile('hinh',$request->file('image'));
           }

          $student = Students::create($params);
          if ($student->id) {
              Session::flash('success','thêm mới thành công sinh viên');
              return redirect()->route('route_student_add');
          }
        }
        return view('student.add');
    }
    public function  edit(StudentRequest $request,$id) {
        //cách 1
//        $student = DB::table('students')
//            ->where('id',$id)->first();
        //cách 2
        $student = Students::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            //
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                //có file mới upload lên sẽ link vào để xóa ảnh cũ đi
              $resultDL = Storage::delete('/public/'.$student->image);
              if ($resultDL) {
                  $params['image'] = uploadFile('hinh',$request->file('image'));
              }
            } else {
                $params['image'] = $student->image;
            }
           $result = Students::where('id',$id)
               ->update($params);
           if ($result) {
               Session::flash('success','sửa  thành công sinh viên');
               return redirect()->route('route_student_edit',['id'=>$id]);
           }
        }
        return view('student.edit',compact('student'));
    }
    public function delete($id) {
        Students::where('id',$id)->delete();
        Session::flash('success','xóa thành công sinh viên có id là'.$id);
        return redirect()->route('route_student_index');
    }
}
