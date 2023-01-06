<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

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
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'user_password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->uncompromised()
            ],
            'user_confirm_password' => ['same:user_password'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => __('Correo ya se encuentra registrado')
        ];
    }

    public function getName()
    {
        return $this->validated()['name'];
    }

    public function getEmail()
    {
        return $this->validated()['email'];
    }

    public function getUserPassword()
    {
        return $this->validated()['user_password'];
    }
}
