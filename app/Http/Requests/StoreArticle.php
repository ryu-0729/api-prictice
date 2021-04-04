<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class StoreArticle extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須項目です',
            'body.required' => '内容は必須項目です',
        ];
    }

    public function failedValidation(Validator $validator) //jsonレスポンスを生成
    {
        $errors = response()->json([
            'message' => 'エラー',
            'errors' => $validator->errors(),
        ], 400, [], JSON_UNESCAPED_UNICODE); //400を返却、より詳細にするなら422を返却するのもありらしい
        throw new HttpResponseException($errors);
    }
}
