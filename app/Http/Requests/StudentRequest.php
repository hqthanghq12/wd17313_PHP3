<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //tạo ra 1 mảng
        $rules = [];
        //lấy ra tên phương thức cần xử lý
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()) :
            case 'POST' :
                switch ($currentAction):
                    case 'add':
                        //xây dựng rules validate trong này
                        $rules = [
                            'name'=>'required',
                            'email'=>'required|email|unique:students',
                            'image'=>'required|image|mimes:jpeg,jpg,png|max:5120' //5120 kb <=> 5mb
                        ];
                    break;
                endswitch;
                break;
        endswitch;
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required'=>'tên khum được để trống',
            'email.required'=>'bắt buộc phải nhập email',
            'email.email'=>'Phải là kiểm email',
            'email.unique'=>'Email đã tồn tại',
            'image.required'=>'Bắt buộc phải nhập ảnh'
        ];
    }
}
