<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPost extends FormRequest
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
        return [
            'title' => 'required|string|min:3',
            'description' => 'nullable|string',
            'price' => 'numeric',
            'quantity' => 'numeric|nullable',
            'category' => 'nullable|in:man,woman,baby',
            'image' => 'required|image|mimes:png,jpg',
        ];
    }
}
