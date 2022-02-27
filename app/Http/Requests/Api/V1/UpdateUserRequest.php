<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            // 'email' => ['sometimes', 'required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['sometimes', 'required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
