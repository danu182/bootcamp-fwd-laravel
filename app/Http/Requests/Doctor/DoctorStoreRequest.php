<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class DoctorStoreRequest extends FormRequest
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
            'specialist'=>[
                'required|exists:specialist,id','integer',
            ],
            'title'=>[
                'required','string','max:255',
            ],
            'fee'=>[
                'required','string','max:255',
            ],
            'photo'=>[
                'nullable','string','max:100000',
            ],
        ];
    }
}
