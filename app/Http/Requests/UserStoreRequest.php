<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'forenames'                  => 'required|string|max:255',
            'surnames'                   => 'required|string|max:255',                 
            'email'                      => 'required|email|max:255|unique:users',
            'password'                   => 'required|string|min:6|max:30',
            //'password_confirm'           => 'required|string|same:db_password',
        ];
    }

    public function messages()
    {
        return [ 
            'forenames.required'        => 'Forenames required',
            'forenames.max'             => 'Forenames max exceed',
            'surnames.required'         => 'Surnames required',
            'surnames.max'              => 'Surnames max exceed',
            'email.unique'              => 'Email already in use',
            'email.required'            => 'Email required',
            'email.email'               => 'Email Invalid',
            'password.required'         => 'Password Required',
            'password.min'              => 'Must contain at least 6 characters ',            
            //'password_confirm.required' => 'Confirmation password required',
            //'password_confirm.same'     => 'Passwords do not match',
        ];
    }
}
