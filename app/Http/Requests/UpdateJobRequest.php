<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('employer')->check();

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'schedule' => 'required|in:Full-time,Part-time,Contract,Internship',
            'location' => 'required|string|max:255',
            'experience_level' => 'required|in:Entry,Mid,Senior,Lead',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|gte:salary_min',
            'apply_type' => 'required|in:email,external',
            'apply_link' => 'nullable|string|max:255',
            'description' => 'required|string',
            'responsibilities' => 'nullable|string',
            'about_company' => 'nullable|string',
            'skills_required' => 'nullable|string',
            'deadline' => 'nullable|date|after_or_equal:today',
            'featured' => 'sometimes|boolean',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The job title is required.',
            'company.required' => 'Please enter the company name.',
            'schedule.required' => 'Select an employment type.',
            'experience_level.required' => 'Select an experience level.',
            'salary_max.gte' => 'Maximum salary must be greater than minimum salary.',
            'deadline.after_or_equal' => 'Deadline cannot be in the past.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'featured' => $this->has('featured'), // true if checked, false if not
        ]);
    }

}
