<?php

namespace App\Http\Requests;
use App\Customer;
use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
            'name'                       => 'required|string|max:255',
            'description'                => 'required|string|max:255',
            //'logo'                       => 'required|string|max:255',
            'contact_name'               => 'required|string|max:255',
            'contact_position'           => 'required|string|max:255',
            'contact_phone'              => 'required|string|max:255',
            'contact_email'              => 'required|email|max:255',
            'db_host'                    => 'required|string|max:255',
            'db_port'                    => 'required|string|max:255',
            'db_name'                    => 'required|string|max:255',
            'db_user'                    => 'required|string|max:255',    
            //'email'                    => 'required|email|max:255|unique:users',
            'db_password'                   => 'required|string|min:6|max:30',
            'password_confirm'           => 'required|string|same:db_password',
        ];
    }

    public function messages()
    {
        return [ 
            'name.required'             => 'Name required',
            'name.max'                  => 'Name max exceed',
            'description.required'      => 'Description required',
            'description.max'           => 'Description max exceed',
            //'logo'                       => 'required|string|max:255',
            'contact_name.required'     => 'Contact name required',
            'contact_position.required' => 'Contact position required',
            'contact_phone.required'    => 'Contact phone required',
            'contact_email.unique'      => 'Email already in use',
            'contact_email.required'    => 'Email required',
            'contact_email.email'       => 'Email Invalid',
            'password.required'         => 'Password Required',
            'password.min'              => 'Must contain at least 6 characters ',
            'db_password.max'              => 'Password max exceed',
            'password_confirm.required' => 'Confirmation password required',
            //'password_confirm.same'     => 'Passwords do not match',
        ];
    }
}
