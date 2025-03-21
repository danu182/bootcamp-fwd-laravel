<?php

namespace App\Http\Requests\Backsite\Configpayment;

use Illuminate\Foundation\Http\FormRequest;

class TestConfigPaymentUptdate extends FormRequest
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
            'fee' => 'required|string|max:255',
            'vat' => 'required|string|max:255',
        ];
    }
}
