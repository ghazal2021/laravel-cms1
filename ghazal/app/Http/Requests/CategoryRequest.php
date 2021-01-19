<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        if($this->slug){
            $this->merge(['slug'=>Str::slug($this->slug)]);
        }else{
            $this->merge(['slug'=>Str::slug($this->name)]);
        }
    }


    public function rules()
    {
        return [
'title'=>'min:2',
            'slug'=>Rule::unique('categories')->ignore(request()->slug)
        ];
    }
    public function messages()
    {
      return[
          'title.min'=>' title at least must be 3  charecters',
          'slug'=>'this name is already taken '
      ];
    }
}
