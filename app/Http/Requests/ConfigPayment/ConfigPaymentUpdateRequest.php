<?php

namespace App\Http\Requests\ConfigPayment;

use Illuminate\Foundation\Http\FormRequest;

class   ConfigPaymentUpdateRequest extends FormRequest
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
    public function rules()
    {
        // return [
        //     'fee'=>[
        //         'required','string','max:255',
        //     ],
        //     'vat'=>[
        //         'required','string','max:255',
        //     ],
        // ];
    
        return [
            'fee' => 'required|string|max:255',
            'vat' => 'required|string|max:255',
        ];
    }
}
