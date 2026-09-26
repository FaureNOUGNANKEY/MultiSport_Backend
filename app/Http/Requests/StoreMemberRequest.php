<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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

            // Champs Member
            'lastname'           => 'required|string|max:255',
            'firstname'          => 'required|string|max:255',
            'address'            => 'required|string|max:255',
            'fatherPhone'        => 'nullable|string|max:20',
            'fatherEmail'        => 'nullable|email|max:255',
            'motherPhone'        => 'nullable|string|max:20',
            'motherEmail'        => 'nullable|email|max:255',
            'athletePhone'       => 'nullable|string|max:20',
            'athleteEmail'       => 'nullable|email|max:255',
            'birthday'           => 'required|date',
            'height'             => 'nullable|integer|min:0',
            'weight'             => 'nullable|integer|min:0',
            'level'              => 'nullable|integer|min:0',
            'novice'             => 'boolean',
            'previousInstructor' => 'nullable|string|max:255',
            'diseases'           => 'nullable|string|max:255',
            'surgicalHistory'    => 'nullable|string|max:255',
            'currentTreatment'   => 'nullable|string|max:255',
            'allergy'            => 'nullable|string|max:255',
            'others'             => 'nullable|string|max:255',
            'type'               => 'required|string|max:50', // MemberType
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

            // Messages Member
            'lastname.required'  => 'Le nom est obligatoire.',
            'firstname.required' => 'Le prénom est obligatoire.',
            'address.required'   => 'L’adresse est obligatoire.',
            'birthday.required'  => 'La date de naissance est obligatoire.',
            'type.required'      => 'Le type de membre est obligatoire.',
        ];
    }
}
