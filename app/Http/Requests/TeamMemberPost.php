<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamMemberPost extends FormRequest
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
            'name' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:png,jpg|max:2048',
            'facebook' =>  ['nullable', 'url', 'regex:/^(https?:\/\/)?(www\.)?facebook\.com\/[a-zA-Z0-9(\.\?)?]/'],
            'linkedin' =>   ['nullable', 'url', 'regex:/^(https?:\/\/)?(www\.)?linkedin\.com\/(in|company)\/[a-zA-Z0-9-]+\/?$/'],
            'twitter' =>  ['nullable', 'url', 'regex:/^(https?:\/\/)?(www\.)?twitter\.com\/[a-zA-Z0-9_]+\/?$/'],
        ];
    }
}
