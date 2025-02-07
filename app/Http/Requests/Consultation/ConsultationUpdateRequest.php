<?php

namespace App\Http\Requests\Consultation;

use Illuminate\Foundation\Http\FormRequest;
// hanya dipakai di request update
use Illuminate\Validation\Rule;

class ConsultationUpdateRequest extends FormRequest
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
            'name' => [
                'required','string','max:255',Rule::unique('consultation')->ignore($this->consultation),
                
            ],
        ];
    }
}
