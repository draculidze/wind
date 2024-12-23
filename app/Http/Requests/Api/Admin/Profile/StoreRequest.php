<?php

namespace App\Http\Requests\Api\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "birthed_at" => 'nullable|date_format:Y-m-d',
            "registered_at" => 'nullable|date_format:Y-m-d',
            "address" => 'nullable|string',
            "phone" => 'nullable|string',
            "avatar" => 'nullable|string',
            "description" => 'nullable|string',
            "gender" => 'required|in:male,female',
            "user" => 'required|string',
        ];
    }
}
