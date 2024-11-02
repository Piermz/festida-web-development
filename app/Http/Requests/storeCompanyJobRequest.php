<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCompanyJobRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'skill_level' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'company_id' => ['required', 'exists:companies,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'responsibilities' => ['nullable', 'array'],
            'responsibilities.*' => ['string', 'max:255'],
            'qualifications' => ['nullable', 'array'],
            'qualifications.*' => ['string', 'max:255'],
        ];
    }
}
