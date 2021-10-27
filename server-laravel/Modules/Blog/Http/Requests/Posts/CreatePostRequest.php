<?php

namespace Modules\Blog\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
    

        return [
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3',
            //  'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
 

      
    }
}
