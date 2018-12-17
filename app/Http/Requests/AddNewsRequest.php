<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddNewsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       return [
            'txtTitle' => 'required|unique:news,title',

            'txtimg' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'txtTitle.required' => ' Hãy nhập tên bản tin ',
            'txtTitle.unique' => 'Bản tin này đã tồn tại',

            'txtimg.required' => 'Hãy chọn một hình ảnh'
            
        ];
    }
}
