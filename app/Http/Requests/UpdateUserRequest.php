<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $user = request()->route('user'); // Route model binding

        return [
            'employee_id' => ['required', 'integer', Rule::unique('users', 'employee_id')->ignore($user?->id)],
            'mobile_number' => ['required', 'string', 'max:15', Rule::unique('users', 'mobile_number')->ignore($user?->id)],
            'full_name' => ['required', 'string', 'max:500'],
            'designation' => ['required', 'string', 'max:100'],
            'nationality' => ['required', 'string', 'max:100'],
            'fathers_name_design_nation' => ['required', 'string', 'max:255'],
            'permanent_address_details' => ['required', 'string'],
            'present_address_details' => ['required', 'string'],
            'birth_date' => ['required', 'date', 'before:today'],
            'birth_place' => ['required', 'string'],

            'education' => ['required', 'array', 'min:1'],
            'education.*.institution_name' => ['required', 'string', 'max:255'],
            'education.*.degree_name' => ['required', 'string', 'max:255'],
            'education.*.reg_no' => ['required', 'string', 'max:255'],
            'education.*.roll_no' => ['required', 'string', 'max:255'],
            'education.*.admission_date' => ['required', 'date'],
            'education.*.admission_session' => ['required', 'string', 'max:255'],
            'education.*.completion_year' => ['required', 'date'],

            'stays' => ['required', 'array', 'min:1'],
            'stays.*.address_details' => ['required', 'string'],
            'stays.*.from_date' => ['required', 'date'],
            'stays.*.to_date' => ['required', 'date', 'after_or_equal:stays.*.from_date'],

            'previous_jobs' => ['nullable', 'array'],
            'previous_jobs.*.organization_name' => ['required_with:previous_jobs', 'string', 'max:255'],
            'previous_jobs.*.from_date' => ['required_with:previous_jobs', 'date'],
            'previous_jobs.*.currently_working' => ['nullable', 'boolean'],
            'previous_jobs.*.to_date' => ['nullable', 'date', 'exclude_if:previous_jobs.*.currently_working,1', 'after_or_equal:previous_jobs.*.from_date'],
            'previous_jobs.*.reason_for_left' => ['nullable', 'string', 'max:500'],

            'is_freedom_fighter_related' => ['required', 'boolean'],
            'freedom_fighter_doc' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],

            'has_disability' => ['required', 'boolean'],
            'disability_doc' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],

            'has_police_case' => ['required', 'boolean'],
            'police_case_details' => ['nullable', 'string', 'required_if:has_police_case,1'],

            'has_govt_relative' => ['required', 'boolean'],
            'govt_relatives' => ['nullable', 'array'],
            'govt_relatives.*.relative_name' => ['required_with:govt_relatives', 'string', 'max:255'],
            'govt_relatives.*.designation' => ['required_with:govt_relatives', 'string', 'max:255'],
            'govt_relatives.*.working_place' => ['required_with:govt_relatives', 'string', 'max:255'],

            'testimonial_file' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],

            'witnesses' => ['required', 'array', 'size:2'],
            'witnesses.*.name' => ['required', 'string', 'max:255'],
            'witnesses.*.address' => ['required', 'string'],

            'is_married' => ['required', 'boolean'],
            'partner_nationality' => ['nullable', 'string', 'required_if:is_married,1'],

            'signature_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:50', 'dimensions:width=120,height=80'],
            'agree_terms' => ['sometimes', 'accepted'],
        ];
    }
}
