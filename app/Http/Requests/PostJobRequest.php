<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostJobRequest extends FormRequest
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
            'apply_link' => 'required|string|max:255',
            'description' => 'required|string',
            'responsibilities' => 'nullable|string',
            'about_company' => 'required|string',
            'skills_required' => 'nullable|string',
            'deadline' => 'nullable|date|after_or_equal:today',
            'featured' => 'sometimes|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Please enter the job title.',
            'company.required' => 'Please enter the company name.',
            'schedule.required' => 'Please select the employment type.',
            'experience_level.required' => 'Please select the experience level.',
            'salary_max.gte' => 'Maximum salary must be greater than or equal to minimum salary.',
            'apply_type.required' => 'Please select the application type.',
            'apply_link.required' => 'Please provide the email or URL for applications.',
            'description.required' => 'Please provide a job description.',
            'responsibilities.required' => 'Please provide job responsibilities.',
            'about_company.required' => 'Please provide company details.',
            'deadline.after_or_equal' => 'Deadline must be today or a future date.',
        ];
    }
}
