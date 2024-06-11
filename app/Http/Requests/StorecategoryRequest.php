<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'namear'=>['unique:categories,name','required','min:4'],
            'nameen'=>['unique:categories,name','required','min:4'],
            'descar'=>['required','min:12'],
            'descen'=>['required','min:12'],
        ];
    }

    public function message(){
        return[
            'namear.unique'=>'The name must be uniqe',
            'namear.required'=>'The field is required',
            'namear.min'=>'The name must be more than 4 character',
            'nameen.unique'=>'The name must be uniqe',
            'nameen.required'=>'The field is required',
            'nameen.min'=>'The name must be more than 4 character',
            'descar.required'=>'The field is required',
            'descar.min'=>'The description must be more than 12 character',
            'descen.required'=>'The field is required',
            'descen.min'=>'The description must be more than12character',
        ];
    }
}
