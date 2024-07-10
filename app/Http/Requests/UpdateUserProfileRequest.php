<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Auth;

class UpdateUserProfileRequest extends FormRequest
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

        if ($request->password) {
            return [
                'username' => "required|min:8|unique:users,email," . $this->input('id') . ",id,deleted_at,NULL",
                'name' => 'required',
                'password' => 'required|alpha_num|min:8|confirmed',
                'password_confirmation' => 'required|alpha_num|min:8',
            ]; 
        }

        return [
            'username' => "required|min:8|unique:users,email," . $this->input('id') . ",id,deleted_at,NULL",
            'name' => 'required',
        ]; 

    }
}
