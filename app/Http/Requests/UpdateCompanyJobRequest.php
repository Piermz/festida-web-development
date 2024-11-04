<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyJobRequest extends FormRequest
{
  /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $company = $this->route('company');
        return $company && $this->user()->can('edit', $company);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
         'salary' => ['required','integer'],
         'company_id' => ['required','integer'],
         'category_id' => ['required','integer'],
         'name' => ['required','string','max:255'],
         'skill_level' => ['required','string','max:255'],
         'location' => ['required','string','max:255'],
         'type' => ['required','string','max:255'],
         'thumbnail' => ['sometimes','image','mimes:jpeg,png,jpg'],
         'responsibilities' => ['required','striing','max:255'],
         'qualifications' => ['required','string','max:255'],
         'about' => ['required','string','max:65535'],
        ];
    }
}