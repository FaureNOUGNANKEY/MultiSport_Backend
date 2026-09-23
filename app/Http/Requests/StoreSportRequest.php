<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreSportRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:sports,name',
            'description' => 'string|max:255'
        ];
    }

    #[Override]
    public function messages(): array
    {
        return [
            'name.required' => 'le mon du sport est obligatoire',
            'name.unique' => 'Ce sport existe déja'
        ];
    }
}
