<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFederationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
   public function rules(): array
    {
        return [
            // Champs User
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',

            // Champs Federation
            'name'               => 'required|string|max:255|unique:federations,name',
            'foundedOn'          => 'required|date',
            'status'             => 'required|string|max:50',
            'receipt'            => 'required|string|max:255',
            'registrationNumber' => 'required|string|max:255|unique:federations,registrationNumber',
            'headOffice'         => 'required|string|max:255',
            'phone'              => 'required|string|max:20',
            'address'            => 'required|string|max:255',
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

            // Messages Federation
            'name.required'               => 'Le nom de la fédération est obligatoire.',
            'name.unique'                 => 'Cette fédération existe déjà.',
            'foundedOn.required'          => 'La date de création est obligatoire.',
            'status.required'             => 'Le statut est obligatoire.',
            'receipt.required'            => 'Le reçu est obligatoire.',
            'registrationNumber.required' => 'Le numéro d’enregistrement est obligatoire.',
            'registrationNumber.unique'   => 'Ce numéro d’enregistrement existe déjà.',
            'headOffice.required'         => 'Le siège est obligatoire.',
            'phone.required'              => 'Le numéro de téléphone est obligatoire.',
            'address.required'            => 'L’adresse est obligatoire.',
        ];
    }
}

