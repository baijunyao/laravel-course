<?php

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class Store extends FormRequest
{
    /**
     * 默认所有的热都不能执行 store 方法
     */
    // public function authorize()
    // {
    //    return false;
    // }

    /**
     * 允许 user_id 为 1 的用户执行 store 方法
     */
    // public function authorize()
    // {
    //     return Auth::id() === 1 ? true : false;
    // }

    /**
     * 允许所有用户执行 store 方法
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tag' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function attributes()
    {
        return [
            'tag' => '标签',
        ];
    }

    public function messages()
    {
        return [
            'tag.required' => '必须选择标签',
        ];
    }
}
