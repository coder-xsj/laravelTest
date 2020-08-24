<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * 获取应用到请求的验证规则
     */
    public function rules()
    {
        return [
            //
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ];
    }
}
