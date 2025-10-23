<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    $bengaliOnly = ['regex:/^[\p{Bengali}\s\.\-(),]+$/u'];

    return [
        'employee_id' => ['required', 'string', 'max:50'],
        'mobile_number' => ['required', 'string', 'regex:/^01[0-9]{9}$/'],

        'full_name' => array_merge(['required', 'string', 'max:255'], $bengaliOnly),
        'designation' => array_merge(['required', 'string', 'max:255'], $bengaliOnly),
        'nationality' => array_merge(['required', 'string', 'max:100'], $bengaliOnly),
        'fathers_name_design_nation' => array_merge(['required', 'string'], $bengaliOnly),
        'permanent_address_details' => array_merge(['required', 'string'], $bengaliOnly),
        'present_address_details' => array_merge(['required', 'string'], $bengaliOnly),

        'birth_date' => ['required', 'date'],
        'birth_place' => array_merge(['required', 'string', 'max:255'], $bengaliOnly),

        // ✅ Conditional required fields
        'is_freedom_fighter_related' => ['nullable', 'boolean'],
        'freedom_fighter_doc' => [
            'nullable',
            'required_if:is_freedom_fighter_related,1',
            'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'
        ],

        'has_disability' => ['nullable', 'boolean'],
        'disability_doc' => [
            'nullable',
            'required_if:has_disability,1',
            'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'
        ],

        'has_police_case' => ['nullable', 'boolean'],
        'police_case_details' => [
            'nullable',
            'required_if:has_police_case,1',
            'string', 'max:500'
        ],

        'has_govt_relative' => ['nullable', 'boolean'],
        'govt_relatives.*.name' => [
            'nullable',
            'required_if:has_govt_relative,1',
            'string'
        ],

        'has_worked_with_army' => ['nullable', 'boolean'],
        'army_files' => [
    'required_if:has_worked_with_army,1',
    'array',
    'min:1', // অন্তত ১টা ফাইল থাকতে হবে
],
'army_files.*' => [
    'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048',
],


        // অন্যান্য নিয়ম
        'education.*.institution_name' => $bengaliOnly,
        'education.*.degree_name' => $bengaliOnly,
        'stays.*.address_details' => $bengaliOnly,

        'signature_file' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:512'],
    ];
}


   public function messages(): array
{
    return [
        'regex' => 'দয়া করে সমস্ত তথ্য বাংলায় লিখুন।',
        'birth_date.date' => 'জন্ম তারিখটি সঠিক ফরম্যাটে দিন (YYYY-MM-DD)।',
        'mobile_number.regex' => 'মোবাইল নম্বরটি সঠিক নয় (১১ সংখ্যার হতে হবে)।',

        // ✅ Conditional required messages
        'freedom_fighter_doc.required_if' => 'মুক্তিযোদ্ধা পরিবারের প্রমাণপত্র আপলোড করতে হবে।',
        'disability_doc.required_if' => 'প্রতিবন্ধকতার প্রমাণপত্র আপলোড করতে হবে।',
        'police_case_details.required_if' => 'মামলার বিস্তারিত লিখতে হবে।',
        'govt_relatives.*.name.required_if' => 'সরকারি আত্মীয়ের নাম দিতে হবে।',
        'army_files.required_if' => 'আর্মি ডকুমেন্ট ফাইল আপলোড করতে হবে।',
    ];
}

}
