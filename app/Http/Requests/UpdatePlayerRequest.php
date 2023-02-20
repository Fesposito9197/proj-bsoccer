<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'profile_photo' => 'nullable|file|max:2048',
            'phone_number' => 'required|string|max:50',
            'description' => 'required|string',
            'birth_date' => 'required|date',
            'city' => 'required|string',
            'roles' => 'required|exists:roles,id',
        ];
    }
}
