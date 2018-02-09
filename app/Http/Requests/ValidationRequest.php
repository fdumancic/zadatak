<?php

namespace App\Http\Requests;

use App\Rules\ValidTag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ValidationRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            
                'title' => 'required',
                'note' => 'required',
                'type' => 'required',
                'tag_id' => ['required', new ValidTag],
   
        ];
    }
}
