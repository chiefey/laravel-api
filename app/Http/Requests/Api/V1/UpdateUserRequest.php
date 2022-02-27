<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // $this->replace($this->except(['email', 'password']));
        $this->replace($this->only(array_diff((new \App\Models\User)->getFillable(), ['email', 'password'])));
    }

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

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (empty($this->request->all())) {
                $validator->errors()->add('requestBody', 'At least one attribute must be specified');
            }
        });
    }
}