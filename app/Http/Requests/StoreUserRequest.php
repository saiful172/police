<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            // User basic information
            'employee_id' => ['required', 'integer', 'unique:users,employee_id'],
            'mobile_number' => ['required', 'string', 'max:15', 'unique:users,mobile_number'],
            'full_name' => ['required', 'string', 'max:500'],
            'designation' => ['required', 'string', 'max:100'],
            'nationality' => ['required', 'string', 'max:100'],
            'fathers_name_design_nation' => ['required', 'string', 'max:255'],
            'permanent_address_details' => ['required', 'string'],
            'birth_date' => ['required', 'date', 'before:today'],
            'birth_place' => ['required', 'string'],
            'present_address_details' => ['required', 'string'],

            // Education details
            'education' => ['required', 'array', 'min:1'],
            'education.*.institution_name' => ['required', 'string', 'max:255'],
            'education.*.degree_name' => ['required', 'string', 'max:255'],
            'education.*.reg_no' => ['required', 'string', 'max:255'],
            'education.*.roll_no' => ['required', 'string', 'max:255'],
            'education.*.admission_date' => ['required', 'date'],
            'education.*.admission_session' => ['required', 'string', 'max:255'],
            'education.*.completion_year' => ['required', 'date'],

            // Stay details
            'stays' => ['required', 'array', 'min:1'],
            'stays.*.address_details' => ['required', 'string'],
            'stays.*.from_date' => ['required', 'date'],
            'stays.*.to_date' => ['required', 'date', 'after_or_equal:stays.*.from_date'],

            // Previous job
            'previous_jobs' => ['nullable', 'array'],
            'previous_jobs.*.organization_name' => ['required_with:previous_jobs', 'string', 'max:255'],
            'previous_jobs.*.from_date' => ['required_with:previous_jobs', 'date'],
            'previous_jobs.*.currently_working' => ['nullable', 'boolean'],
            'previous_jobs.*.to_date' => ['nullable', 'date', 'exclude_if:previous_jobs.*.currently_working,1', 'after_or_equal:previous_jobs.*.from_date'],
            'previous_jobs.*.reason_for_left' => ['nullable', 'string', 'max:500'],

            // Army
            'has_worked_with_army' => ['required', 'boolean'],
            'army_files' => ['nullable', 'array', 'required_if:has_worked_with_army,1'],
            'army_files.*' => ['required_with:army_files', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],

            // Freedom fighter
            'is_freedom_fighter_related' => ['required', 'boolean'],
            'freedom_fighter_doc' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:2048', 'required_if:is_freedom_fighter_related,1'],

            // Disability
            'has_disability' => ['required', 'boolean'],
            'disability_doc' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:2048', 'required_if:has_disability,1'],

            // Police case
            'has_police_case' => ['required', 'boolean'],
            'police_case_details' => ['nullable', 'string', 'required_if:has_police_case,1'],

            // Govt relatives
            'has_govt_relative' => ['required', 'boolean'],
            'govt_relatives' => ['nullable', 'array', 'required_if:has_govt_relative,1'],
            'govt_relatives.*.relative_name' => ['required_if:has_govt_relative,1', 'nullable', 'string', 'max:255'],
            'govt_relatives.*.designation' => ['required_if:has_govt_relative,1', 'nullable', 'string', 'max:255'],
            'govt_relatives.*.working_place' => ['required_if:has_govt_relative,1', 'nullable', 'string', 'max:255'],

            // Testimonial
            'testimonial_file' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            // Witnesses
            'witnesses' => ['required', 'array', 'size:2'],
            'witnesses.*.name' => ['required', 'string', 'max:255'],
            'witnesses.*.address' => ['required', 'string'],

            // Marital
            'is_married' => ['required', 'boolean'],
            'partner_nationality' => ['nullable', 'string', 'required_if:is_married,1'],

            // Signature
            'signature_file' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:50', 'dimensions:width=120,height=80'],
            
            // Agreement
            'agree_terms' => ['accepted'],
        ];
    }

    /**
     * Custom Bangla validation messages.
     */
    public function messages(): array
    {
        return [
            // Basic
            'employee_id.required' => 'কর্মচারীর আইডি দিতে হবে।',
            'employee_id.integer' => 'কর্মচারীর আইডি অবশ্যই একটি সংখ্যা হতে হবে।',
            'employee_id.unique' => 'এই কর্মচারীর আইডি ইতিমধ্যেই নিবন্ধিত আছে।',

            'mobile_number.required' => 'মোবাইল নম্বর দিতে হবে।',
            'mobile_number.unique' => 'এই মোবাইল নম্বর ইতিমধ্যেই নিবন্ধিত আছে।',
            'mobile_number.max' => 'মোবাইল নম্বর সর্বোচ্চ ১৫ অক্ষরের মধ্যে হতে হবে।',

            'full_name.required' => 'পূর্ণ নাম লিখুন।',
            'designation.required' => 'পদবী লিখুন।',
            'nationality.required' => 'জাতীয়তা লিখুন।',
            'fathers_name_design_nation.required' => 'পিতার নাম, পদবী ও জাতীয়তা লিখুন।',
            'permanent_address_details.required' => 'স্থায়ী ঠিকানা দিতে হবে।',
            'present_address_details.required' => 'বর্তমান ঠিকানা দিতে হবে।',
            'birth_date.required' => 'জন্মতারিখ দিতে হবে।',
            'birth_date.before' => 'জন্মতারিখ অবশ্যই আজকের তারিখের পূর্বে হতে হবে।',
            'birth_place.required' => 'জন্মস্থান লিখুন।',

            // Education
            'education.required' => 'কমপক্ষে একটি শিক্ষাগত যোগ্যতা যুক্ত করুন।',
            'education.*.institution_name.required' => 'শিক্ষা প্রতিষ্ঠানের নাম লিখুন।',
            'education.*.degree_name.required' => 'ডিগ্রির নাম লিখুন।',
            'education.*.reg_no.required' => 'রেজিস্ট্রেশন নম্বর লিখুন।',
            'education.*.roll_no.required' => 'রোল নম্বর লিখুন।',
            'education.*.admission_date.required' => 'ভর্তির তারিখ দিন।',
            'education.*.completion_year.required' => 'পাসের বছর দিন।',

            // Stay
            'stays.required' => 'কমপক্ষে একটি বাসস্থান তথ্য দিন।',
            'stays.*.address_details.required' => 'ঠিকানা দিতে হবে।',
            'stays.*.from_date.required' => 'শুরুর তারিখ দিতে হবে।',
            'stays.*.to_date.required' => 'শেষ তারিখ দিতে হবে।',
            'stays.*.to_date.after_or_equal' => 'শেষ তারিখ শুরুর তারিখের সমান বা পরের হতে হবে।',

            // Job
            'previous_jobs.*.organization_name.required_with' => 'প্রতিষ্ঠানের নাম লিখুন।',
            'previous_jobs.*.from_date.required_with' => 'চাকরির শুরুর তারিখ দিন।',
            'previous_jobs.*.to_date.after_or_equal' => 'চাকরির শেষ তারিখ শুরুর তারিখের সমান বা পরের হতে হবে।',

            // Army
            'has_worked_with_army.required' => 'আপনি সেনাবাহিনীতে কাজ করেছেন কি না তা নির্বাচন করুন।',
            'army_files.required_if' => 'সেনাবাহিনীতে কাজ করলে প্রমাণপত্র দিতে হবে।',
            'army_files.*.file' => 'প্রতিটি ফাইল সঠিক ফরম্যাটে হতে হবে (jpg, jpeg, png, webp)।',
            'army_files.*.max' => 'প্রতিটি ফাইল সর্বোচ্চ ৫ এমবি হতে পারবে।',

            // Freedom fighter
            'is_freedom_fighter_related.required' => 'মুক্তিযোদ্ধা সম্পর্কিত তথ্য নির্বাচন করুন।',
            'freedom_fighter_doc.required_if' => 'মুক্তিযোদ্ধা সম্পর্কিত হলে প্রমাণপত্র দিতে হবে।',

            // Disability
            'has_disability.required' => 'আপনার কোনো প্রতিবন্ধকতা আছে কি না তা নির্বাচন করুন।',
            'disability_doc.required_if' => 'প্রতিবন্ধকতা থাকলে প্রমাণপত্র দিতে হবে।',

            // Police
            'has_police_case.required' => 'পুলিশ কেস আছে কি না তা নির্বাচন করুন।',
            'police_case_details.required_if' => 'পুলিশ কেস থাকলে বিস্তারিত লিখুন।',

            // Govt relatives
            'has_govt_relative.required' => 'সরকারি চাকরিতে আত্মীয় আছে কি না তা নির্বাচন করুন।',
            'govt_relatives.required_if' => 'সরকারি চাকরিতে আত্মীয় থাকলে তথ্য দিতে হবে।',
            'govt_relatives.*.relative_name.required_if' => 'আত্মীয়ের নাম লিখুন।',
            'govt_relatives.*.designation.required_if' => 'আত্মীয়ের পদবী লিখুন।',
            'govt_relatives.*.working_place.required_if' => 'আত্মীয়ের কর্মস্থল লিখুন।',

            // Testimonial
            'testimonial_file.mimes' => 'প্রমাণপত্র jpg, jpeg, png বা webp ফরম্যাটে হতে হবে।',
            'testimonial_file.max' => 'প্রমাণপত্র ফাইল সর্বোচ্চ ২ এমবি হতে পারবে।',

            // Witness
            'witnesses.required' => 'দুইজন সাক্ষীর তথ্য দিতে হবে।',
            'witnesses.size' => 'ঠিক দুইজন সাক্ষীর তথ্য দিতে হবে।',
            'witnesses.*.name.required' => 'সাক্ষীর নাম লিখুন।',
            'witnesses.*.address.required' => 'সাক্ষীর ঠিকানা লিখুন।',

            // Marital
            'is_married.required' => 'বৈবাহিক অবস্থা নির্বাচন করুন।',
            'partner_nationality.required_if' => 'বিবাহিত হলে স্বামী/স্ত্রীর জাতীয়তা লিখুন।',

            // Signature
            'signature_file.required' => 'স্বাক্ষর ছবি দিতে হবে।',
            'signature_file.image' => 'স্বাক্ষর অবশ্যই একটি ছবি হতে হবে।',
            'signature_file.mimes' => 'স্বাক্ষর jpg, jpeg বা png ফরম্যাটে হতে হবে।',
            'signature_file.max' => 'স্বাক্ষর ছবির সাইজ ৫০KB এর কম হতে হবে।',
            'signature_file.dimensions' => 'স্বাক্ষর ছবির মাপ ১২০x৮০ পিক্সেল হতে হবে।',

            // Agreement
            'agree_terms.accepted' => 'ফর্ম জমা দিতে হলে শর্তাবলীতে সম্মতি দিতে হবে।',
        ];
    }
}
