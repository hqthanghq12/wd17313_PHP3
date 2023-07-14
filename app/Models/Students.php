<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table = "students";//đúng tên bảng trong cơ sở dữ liệ
    protected $fillable = ['id','email','name']; // định nghĩa những trường csdl gán trong model để add được giá trị lên
}
