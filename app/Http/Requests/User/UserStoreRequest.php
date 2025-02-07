<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // create middleware from karnel at here
        // return false;
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
                'email', 'unique:users','max:255'
            ],
            'password'=> [
               'required','string','min:8','max:255',
            ],
        ];
    }
}
