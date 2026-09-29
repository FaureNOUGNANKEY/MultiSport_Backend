<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBureauRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
     public function rules(): array
    {
        return [
            // Champs Bureau
            'startDate'       => 'required|date',
            'endDate'         => 'nullable|date',

            // Relations organisationnelles
            'club_id'       => 'nullable|exists:clubs,id',
            'league_id'     => 'nullable|exists:leagues,id',
            'federation_id' => 'nullable|exists:federations,id',

            // Rôles du bureau (chaque champ est un membre)
            'president'       => 'required|exists:members,id',
            'secretary'       => 'required|exists:members,id',
            'treasurer'       => 'required|exists:members,id',
            'vicePresident1'  => 'nullable|exists:members,id',
            'vicePresident2'  => 'nullable|exists:members,id',
            'deputySecretary' => 'nullable|exists:members,id',
            'deputyTreasurer' => 'nullable|exists:members,id',
            'boardMember1'    => 'nullable|exists:members,id',
            'boardMember2'    => 'nullable|exists:members,id',
        ];
    }

    /**
     * Messages personnalisés (optionnel).
     */
    public function messages(): array
    {
        return [
            'startDate.required' => 'La date de début est obligatoire.',
            'president_id.required' => 'Le président doit être défini.',
            'secretary_id.required' => 'Le secrétaire doit être défini.',
            'treasurer_id.required' => 'Le trésorier doit être défini.',
            'president_id.exists' => 'Le président doit être un membre valide.',
            'secretary_id.exists' => 'Le secrétaire doit être un membre valide.',
            'treasurer_id.exists' => 'Le trésorier doit être un membre valide.',
        ];
    }
}
