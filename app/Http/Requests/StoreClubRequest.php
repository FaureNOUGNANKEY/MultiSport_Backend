<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClubRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            // Champs User
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',

            // Champs Club
            'receipt'             => 'required|string|max:255',
            'registrationNumber'  => 'required|string|max:255|unique:clubs,registrationNumber',
            'headOffice'          => 'required|string|max:255',
            'founderLastname'     => 'required|string|max:255',
            'founderFirstname'    => 'required|string|max:255',
            'foundedOn'           => 'required|date',
            'status'              => 'required|string|max:50',
            'phone'               => 'required|string|max:20',
            'address'             => 'required|string|max:255',
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

            // Messages Club
            'receipt.required'            => 'Le reçu est obligatoire.',
            'registrationNumber.required' => 'Le numéro d’enregistrement est obligatoire.',
            'registrationNumber.unique'   => 'Ce numéro d’enregistrement existe déjà.',
            'headOffice.required'         => 'Le siège est obligatoire.',
            'founderLastname.required'    => 'Le nom du fondateur est obligatoire.',
            'founderFirstname.required'   => 'Le prénom du fondateur est obligatoire.',
            'foundedOn.required'          => 'La date de création est obligatoire.',
            'status.required'             => 'Le statut est obligatoire.',
            'phone.required'              => 'Le numéro de téléphone est obligatoire.',
            'address.required'            => 'L’adresse est obligatoire.',
        ];
    }
}
