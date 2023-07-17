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
        $rules = [];
        //lấy các phương thức đang hoạt động
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($currentAction):
                    case "addstudent":
                        $rules = [
                            "name"=>"required",
                            "email"=>"required|email|unique:students",
                            "image"=>"required|image|mimes:jpeg,jpg,png|max:5120",
                        ];
                        break;
                        endswitch;
        endswitch;
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required'=>'bắt buộc phải nhập name',
            'email.required'=>'bắt buộc phải nhập email',
            'email.unique'=>'email không được trùng đâu nha '
        ];
    }
}
