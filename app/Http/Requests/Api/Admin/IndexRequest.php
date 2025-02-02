<?php

namespace App\Http\Requests\Api\Admin;

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
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'published_at_from' => 'nullable|date_format:Y-m-d',
            'published_at_to' => 'nullable|date_format:Y-m-d',
            'category_title' => 'nullable|string',
            'slug' => 'nullable|string',
            'image_path' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
            'created_at_from' => 'nullable|date_format:Y-m-d',
            'created_at_to' => 'nullable|date_format:Y-m-d',
            'updated_at_from' => 'nullable|date_format:Y-m-d',
            'updated_at_to' => 'nullable|date_format:Y-m-d',
            'profile_login' => 'nullable|string',
        ];
    }
}
