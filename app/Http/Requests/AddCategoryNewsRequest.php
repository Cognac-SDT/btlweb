<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 14/09/2018
 * Time: 7:30 AM
 */

namespace App\Http\Requests;


use App\Http\Requests\Request;

class AddCategoryNewsRequest extends Request
{
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
            'txtCateTitle' => 'required|unique:category_news,title'
        ];
    }
    public function messages()
    {
        return [
            'txtCateTitle.required' => ' Hãy nhập tên danh mục bài viết ',
            'txtCateTitle.unique' => 'Tên danh mục này đã tồn tại '

        ];
    }
}