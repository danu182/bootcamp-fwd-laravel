<?php

namespace App\Http\Requests\Specialist;

// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;


// this Rule only at update request
use Illuminate\Validation\Rule;

class SpecialistUpdateRequest extends FormRequest
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
                'required','string','max:255',Rule::unique('specialist')->ignore($this->specialist),
                // Role unique only works for other record id
            ],
            'price' => [
                'required','string','max:255'
            ],
        ];
    }
}
