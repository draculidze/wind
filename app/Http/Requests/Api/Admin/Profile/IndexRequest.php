<?php

namespace App\Http\Requests\Api\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "created_at_from" => "nullable|date_format:Y-m-d",
            "created_at_to" => "nullable|date_format:Y-m-d",
            "updated_at_from" => "nullable|date_format:Y-m-d",
            "updated_at_to" => "nullable|date_format:Y-m-d",
            "login" => "nullable|string",
            "birthed_at_from" => "nullable|date_format:Y-m-d",
            "birthed_at_to" => "nullable|date_format:Y-m-d",
            "registered_at_from" => "nullable|date_format:Y-m-d",
            "registered_at_to" => "nullable|date_format:Y-m-d",
            "address" => "nullable|string",
            "phone" => "nullable|string",
            "avatar" => "nullable|string",
            "description" => "nullable|string",
            "gender" => "nullable|string",
            "user_name" => "nullable|string"
        ];
    }
}
