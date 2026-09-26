<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLogRequest extends FormRequest
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
            'user_id'    => 'required|exists:users,id',
            'action'     => 'required|string|max:255',
            'description'=> 'nullable|string',
            'actionDate' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Un utilisateur est obligatoire.',
            'user_id.exists'   => 'Cet utilisateur n’existe pas.',
            'action.required'  => 'L’action est obligatoire.',
            'actionDate.required' => 'La date de l’action est obligatoire.',
        ];
    }
}
