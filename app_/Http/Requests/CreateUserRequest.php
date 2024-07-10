<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Auth;

class CreateUserRequest extends FormRequest
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

        if (Auth::user()->role_id == 1) {
            if ($request->password) {
                return [
                    'username' => "required|min:8|unique:users,email," . $this->input('id') . ",id,deleted_at,NULL",
                    'name' => 'required',
                    'role_id' => 'required',
                    'password' => 'required|alpha_num|min:8|confirmed',
                    'password_confirmation' => 'required|alpha_num|min:8',
                ]; 
            }

            return [
                'username' => "required|min:8|unique:users,email," . $this->input('id') . ",id,deleted_at,NULL",
                'name' => 'required',
                'role_id' => 'required',
            ]; 
        }

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
