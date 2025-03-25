<?php

namespace App\Http\Requests\Api\V1\Thread;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
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
        return [
            'data.attributes.title' => ['required', 'string'],
            'data.attributes.body' => ['required', 'string'],
            'data.attributes.published' => ['nullable', 'boolean'],
        ];
    }
}
