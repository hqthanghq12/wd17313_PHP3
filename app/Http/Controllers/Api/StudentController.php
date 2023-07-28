<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    // do quy dinh giua front va bac
    //status : error la loi | success la thanh cong
    // tra cuu 1 so trang thai tra ve dang  so
    public function index(Request $request) {
//        dd($request->name);
        //validate API
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|string'
        ]);
        if ($validator->fails()) {
            return  [
              'status'=> 400,
              'message' =>   $validator->errors()->first(),
              'error' =>   $validator->errors()->toArray()
            ];
        }
        $dataStudent = Students::where('name','LIKE','%'.$request->name.'%')->get();
        // truyền vào param là start và end để phân trang

        // viết API truyền vào param name để tìm các sinh viên có tên gần đúng như param truyền lên
//        $dataStudent = Students::all();
//        $dataJson = [
//            [
//              'name'=>'Hoàng Quang Thắng',
//              'username'=> 'thanghq12',
//              'birth'=>1996
//            ],
//            [
//                'name'=>'Hoàng Quang Thắng',
//                'username'=> 'thanghq12',
//                'birth'=>1996
//            ],
//            [
//                'name'=>'Hoàng Quang Thắng',
//                'username'=> 'thanghq12',
//                'birth'=>1996
//            ],
//
//        ];
        return $dataStudent;
        // response()->json($dataJson)

    }
}
