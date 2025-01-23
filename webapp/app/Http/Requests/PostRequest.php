<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    //リクエストのバリデーションを定義
    public function rules(): array
    {
        return [
            'title' => 'required|max:255', //最大255文字
            'author_id' => 'required|numeric',//数値
            'content' => 'nullable|max:1000',//NULLを許可、最大1000文字
        ];
    }
}
