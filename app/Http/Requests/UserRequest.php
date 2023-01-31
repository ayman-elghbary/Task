<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * store validation
     */
    public function storeRequests()
    {
        return  [

           'name'=> 'required',
           'email'=>'required|unique:users',
        //    'email_verified_at' => now(),
           'password' =>['required',Password::min(6)],
        //    'pro'=> 'required|number',

        ];

    }        
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return request()->method() == 'PUT' ? $this->updateRequests() : $this->storeRequests();
    }
}
