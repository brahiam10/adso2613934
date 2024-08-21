<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Validation\Rule;
use SebastianBergmann\Type\TrueType;

class UserRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            return [
                'document' => ['required', 'numeric', Rule::unique('users')->ignore($this->user)],
                'fullname' => ['required', 'string'],
                'gender' => ['required', 'string'],
                'birthdate' => ['required', 'date'],
                'photo' => ['nullable', 'image'],
                'phone' => ['required', 'string'],
                'email' => ['required', 'string', 'lowercase', 'email', Rule::unique('users')->ignore($this->user)],
            ];
        } else {
            return [
                'document' => ['required', 'numeric', 'unique:' . User::class],
                'fullname' => ['required', 'string'],
                'gender' => ['required', 'string'],
                'birthdate' => ['required', 'date'],
                'photo' => ['nullable', 'image'],
                'phone' => ['required', 'string'],
                'email' => ['required', 'string', 'lowercase', 'email', 'unique:' . User::class],
                'password' => ['required', 'confirmed'],
            ];
        }
    }

    public function message(): array
    {
        return[
            'fullname.required' => 'The Fullname is required'
        ];
    }

    public function attributes(): array
    {
        return[
            'fullname' => 'Nombre Completo'
        ];
    }
}