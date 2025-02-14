<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'phone'     => ['required', 'numeric', 'min:8'  , 'max:12' , 'unique:users'],
            'email'     => ['string'  , 'email' , 'max:255' , 'unique:users'],
            'name'      => ['required', 'string', 'max:255'],
            'type_user' => ['required', 'numeric'],
            'password'  => ['required', 'string', 'min:8' , 'confirmed'],
        ];
    }
}
