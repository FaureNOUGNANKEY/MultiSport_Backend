<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Champs User
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',

            // Champs Admin
            'lastname'  => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            // Messages User
            'email.required'    => 'L’email est obligatoire.',
            'email.email'       => 'L’email doit être valide.',
            'email.unique'      => 'Cet email est déjà utilisé.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min'      => 'Le mot de passe doit contenir au moins 6 caractères.',

            // Messages Admin
            'lastname.required' => 'Le nom est obligatoire.',
            'lastname.string'   => 'Le nom doit être une chaîne de caractères.',
            'lastname.max'      => 'Le nom ne doit pas dépasser 255 caractères.',

            'firstname.required' => 'Le prénom est obligatoire.',
            'firstname.string'   => 'Le prénom doit être une chaîne de caractères.',
            'firstname.max'      => 'Le prénom ne doit pas dépasser 255 caractères.',
        ];
    }
}
