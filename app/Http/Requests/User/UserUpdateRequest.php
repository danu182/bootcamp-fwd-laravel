<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

// this Rule only at update request
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // create middleware from karnel at here
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
            'name'=> [
                'required', 'string','max:255'
            ],
            'email'=> [
                'email','max:255', Rule::unique('users')->ignore($this->user),
                // Role unique only works for other record id 
            ],
            // 'password'=> [
            //    'required','string','min:8','max:255',
            // ],
        ];
    }
}
