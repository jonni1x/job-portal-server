<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'email' => 'required|email|unique:users',   
            'phone' => 'string',
            'signature' => 'string',
            // 'address' => 'regex:/([- ,\/0-9a-zA-Z]+)/',
            // 'profile_img' => 'image|mimes:jpeg,png,jpg|max:2048',
            'verified' => 'boolean',
            'role_id' => 'numeric',
            'password' => 'required'
        ];
    }
}
