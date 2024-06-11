<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreappetizersRequest extends FormRequest
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
            'namear'=>['unique:appetizers,name','required'],
            'nameen'=>['unique:appetizers,name','required'],
            'descar'=>['min:10','required'],
            'descen'=>['min:10','required'],
            'price'=>['required'],
            'status'=>['required'],
            'category'=>['required'],
            'image'=>['mimes:jpg,bmp,png','required'],
        ];
    }

    public function message(){
        return[
            'namear.unique'=>'The name must be uniqe',
            'namear.required'=>'The field is required',
            'nameen.unique'=>'The name must be uniqe',
            'nameen.required'=>'The field is required',
            'descar.required'=>'The field is required',
            'descar.min'=>'The description must be more than 10 character',
            'descen.required'=>'The field is required',
            'descen.min'=>'The description must be more than 10 character',
            'price.required'=>'The Price is required',
            'status.required'=>'The Status is required',
            'category.required'=>'The Category is required',
            'image.required'=>'The Image is required',
            'image.mimes'=>'The Image must be jpg or bmp or png',
        ];
        
    }
}
