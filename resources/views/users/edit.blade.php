<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>পুলিশ যাচাইকরণ সম্পাদনা করুন</title>
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;600;700&display=swap" rel="stylesheet" />
       <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: "Kalpurush", "Noto Sans Bengali", "Hind Siliguri", "SolaimanLipi", Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 1.8rem;
        }
        h2 {
            color: #444;
            margin-top: 30px;
            margin-bottom: 5px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
            font-size: 1rem;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
            font-size: 0.95rem;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="tel"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        .row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .dynamic-section {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #e0e0e0;
        }
        .dynamic-row {
            background: white;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            position: relative;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-success:disabled {
            background-color: #6c757d;
            opacity: 0.5;
            cursor: not-allowed;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .remove-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .add-row-btn {
            margin-top: 10px;
        }
        .submit-section {
            text-align: center;
            margin-top: 30px;
        }
        .error {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .instruction-banner {
            background-color: #ff073a;
            color: #ffffff;
            /* border: 2px solid #ffc107; */
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
        }

        /* ✅ Responsive Adjustments */
        @media (max-width: 992px) {
            .container {
                padding: 20px;
            }
            .row {
                grid-template-columns: 1fr 1fr;
                gap: 15px;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
            .container {
                padding: 15px;
            }
            .row {
                grid-template-columns: 1fr;
                gap: 10px;
            }
            h1 {
                font-size: 1.5rem;
            }
            h2 {
                font-size: 0.95rem;
            }
            label {
                font-size: 0.9rem;
            }
            input, textarea, select {
                font-size: 13px;
                padding: 8px;
            }
            .btn {
                font-size: 13px;
                padding: 8px 15px;
            }
        }

        @media (max-width: 480px) {
            .instruction-banner {
                font-size: 14px;
                padding: 10px;
            }
            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
            .remove-btn {
                position: relative;
        top: 0;
        right: 0;
        width: 100%;
        display: block;
        text-align: center;
        margin-bottom: 10px;
        font-size: 13px;
        padding: 6px 0;
            }
            .dynamic-section {
                padding: 15px;
            }
            .dynamic-row {
                padding: 10px;
            }
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }
            .btn, .add-row-btn, .remove-btn {
                display: none !important;
            }
            .container {
                box-shadow: none;
                border: none;
                padding: 0;
            }
        }
    </style>
    @php
        // Prepare data sources preferring old() when available for dynamic arrays
        $oldEducation = old('education');
        $oldStays = old('stays');
        $oldJobs = old('previous_jobs');
        $oldRelatives = old('govt_relatives');
        $oldWitnesses = old('witnesses');
    @endphp
    
</head>
<body>
    <div class="container">
        <h1>পুলিশ যাচাইকরণ সম্পাদনা করুন</h1>

        <div class="instruction-banner">
             দয়া করে সমস্ত তথ্য বাংলায় লিখুন 
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST" id="verificationForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h2>প্রার্থীর অফিস আইডি ও মোবাইল নম্বর</h2>
            <div class="row">
                <div class="form-group">
                    <label for="employee_id">প্রার্থীর অফিস আইডি <span style="color: red;">*</span></label>
                    <input type="number" name="employee_id" id="employee_id" value="{{ old('employee_id', $user->employee_id) }}" required>
                    @error('employee_id')<span class="muted">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="mobile_number">মোবাইল নম্বর <span style="color: red;">*</span></label>
                    <input type="tel" name="mobile_number" id="mobile_number" value="{{ old('mobile_number', $user->mobile_number) }}" required>
                    @error('mobile_number')<span class="muted">{{ $message }}</span>@enderror
                </div>
            </div>

            <h2>ব্যক্তিগত তথ্য</h2>
            <div class="row">
                <div class="form-group">
                    <label for="designation">পদবী (অফিস কর্তৃক পূরণীয়) <span style="color: red;">*</span></label>
                    <input type="text" name="designation" id="designation" value="{{ old('designation', $user->designation) }}" required>
                    @error('designation')<span class="muted">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="full_name">১। প্রার্থীর পূর্ণ নাম (ডাক নামসহ স্পষ্টাক্ষরে) <span style="color: red;">*</span></label>
                    <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $user->full_name) }}" required>
                    @error('full_name')<span class="muted">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="nationality">২। জাতীয়তা <span style="color: red;">*</span></label>
                    <input type="text" name="nationality" id="nationality" value="{{ old('nationality', $user->nationality) }}" required>
                    @error('nationality')<span class="muted">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="fathers_name_design_nation">৩। পিতার পূর্ণ নাম ও (চাকুরীরত থাকিলে) পদের নাম ও জাতীয়তা <span style="color: red;">*</span></label>
                    <input type="text" name="fathers_name_design_nation" id="fathers_name_design_nation" value="{{ old('fathers_name_design_nation', $user->fathers_name_design_nation) }}" required>
                    @error('fathers_name_design_nation')<span class="muted">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-group">
                <label for="permanent_address_details">৪। স্থায়ী ঠিকানা (গ্রাম, ডাকঘর, থানা ও জেলা) <span style="color: red;">*</span></label>
                <textarea name="permanent_address_details" id="permanent_address_details" required>{{ old('permanent_address_details', $user->permanent_address_details) }}</textarea>
                @error('permanent_address_details')<span class="muted">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="present_address_details">৫। বর্তমান বাসস্থানের ঠিকানা <span style="color: red;">*</span></label>
                <textarea name="present_address_details" id="present_address_details" required>{{ old('present_address_details', $user->present_address_details) }}</textarea>
                @error('present_address_details')<span class="muted">{{ $message }}</span>@enderror
            </div>

            <!-- 6. Last 5 Years Stay Details -->
            <h2>৬। প্রার্থী যেসব স্থানে বিগত পাঁচ বছরে ছয় মাসের অধিক অবস্থান করেছেন সেই সব স্থানের ঠিকানা</h2>
            <div class="dynamic-section">
                <div id="stay-container">
                    @php $stays = $oldStays ?? $user->last5YearsStays->map(fn($s)=>[
                        'address_details'=>$s->address_details,
                        'from_date'=>optional($s->from_date)->format('Y-m-d'),
                        'to_date'=>optional($s->to_date)->format('Y-m-d'),
                    ])->toArray(); @endphp
                    @forelse($stays as $i => $stay)
                        <div class="dynamic-row stay-row">
                            @if($i>0)<button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ ডিলিট</button>@endif
                            <div class="form-group">
                                <label>ঠিকানার বিবরণ <span style="color: red;">*</span></label>
                                <textarea name="stays[{{ $i }}][address_details]" required>{{ $stay['address_details'] ?? '' }}</textarea>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>শুরুর তারিখ <span style="color: red;">*</span></label>
                                    <input type="date" name="stays[{{ $i }}][from_date]" value="{{ $stay['from_date'] ?? '' }}" required>
                                </div>
                                <div class="form-group">
                                    <label>শেষ তারিখ <span style="color: red;">*</span></label>
                                    <input type="date" name="stays[{{ $i }}][to_date]" value="{{ $stay['to_date'] ?? '' }}" required>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="dynamic-row stay-row">
                            <div class="form-group">
                                <label>ঠিকানার বিবরণ <span style="color: red;">*</span></label>
                                <textarea name="stays[0][address_details]" required></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>শুরুর তারিখ <span style="color: red;">*</span></label>
                                    <input type="date" name="stays[0][from_date]" required>
                                </div>
                                <div class="form-group">
                                    <label>শেষ তারিখ <span style="color: red;">*</span></label>
                                    <input type="date" name="stays[0][to_date]" required>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <button type="button" class="btn btn-primary add-row-btn" onclick="addStayRow()">+ আরও যোগ করুন</button>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="birth_date">৭। জন্ম তারিখ <span style="color: red;">*</span></label>
                    <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', optional($user->birth_date)->format('Y-m-d')) }}" required>
                    @error('birth_date')<span class="muted">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="birth_place">৮। জন্ম স্থান (ডাকঘর, থানা/উপজেলা, জেলা) <span style="color: red;">*</span></label>
                    <input type="text" name="birth_place" id="birth_place" value="{{ old('birth_place', $user->birth_place) }}" required>
                    @error('birth_place')<span class="muted">{{ $message }}</span>@enderror
                </div>
            </div>

            <!-- 9. Education Details -->
            <h2>৯। শিক্ষাগত যোগ্যতা (১৫ বৎসর বয়স হইতে)</h2>
            <div class="dynamic-section">
                <div id="education-container">
                    @php $education = $oldEducation ?? $user->educationDetails->map(fn($e)=>[
                        'institution_name'=>$e->institution_name,
                        'degree_name'=>$e->degree_name,
                        'reg_no'=>$e->reg_no,
                        'roll_no'=>$e->roll_no,
                        'admission_date'=>optional($e->admission_date)->format('Y-m-d'),
                        'admission_session'=>$e->admission_session,
                        'completion_year'=>optional($e->completion_year)->format('Y-m-d'),
                    ])->toArray(); @endphp
                    @forelse($education as $i => $edu)
                        <div class="dynamic-row education-row">
                            @if($i>0)<button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ ডিলিট</button>@endif
                            <div class="form-group">
                                <label>বিদ্যালয় / মহাবিদ্যালয় / বিশ্ববিদ্যালয়ের নাম <span style="color: red;">*</span></label>
                                <input type="text" name="education[{{ $i }}][institution_name]" value="{{ $edu['institution_name'] ?? '' }}" required>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>পাসকৃত পরীক্ষার নাম <span style="color: red;">*</span></label>
                                    <input type="text" name="education[{{ $i }}][degree_name]" value="{{ $edu['degree_name'] ?? '' }}" required>
                                </div>
                                <div class="form-group">
                                    <label>রেজিস্ট্রেশন নম্বর <span style="color: red;">*</span></label>
                                    <input type="text" name="education[{{ $i }}][reg_no]" value="{{ $edu['reg_no'] ?? '' }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>রোল নম্বর <span style="color: red;">*</span></label>
                                    <input type="number" name="education[{{ $i }}][roll_no]" value="{{ $edu['roll_no'] ?? '' }}" required>
                                </div>
                                <div class="form-group">
                                    <label>ভর্তির তারিখ <span style="color: red;">*</span></label>
                                    <input type="date" name="education[{{ $i }}][admission_date]" value="{{ $edu['admission_date'] ?? '' }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>ভর্তির সেশন <span style="color: red;">*</span></label>
                                    <input type="text" name="education[{{ $i }}][admission_session]" value="{{ $edu['admission_session'] ?? '' }}" placeholder="যেমন: ২০২০-২০২১" required>
                                </div>
                                <div class="form-group">
                                    <label>পাশের সাল <span style="color: red;">*</span></label>
                                    <input type="date" name="education[{{ $i }}][completion_year]" value="{{ $edu['completion_year'] ?? '' }}" required>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="dynamic-row education-row">
                            <div class="form-group">
                                <label>বিদ্যালয় / মহাবিদ্যালয় / বিশ্ববিদ্যালয়ের নাম <span style="color: red;">*</span></label>
                                <input type="text" name="education[0][institution_name]" required>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>পাসকৃত পরীক্ষার নাম <span style="color: red;">*</span></label>
                                    <input type="text" name="education[0][degree_name]" required>
                                </div>
                                <div class="form-group">
                                    <label>রেজিস্ট্রেশন নম্বর <span style="color: red;">*</span></label>
                                    <input type="text" name="education[0][reg_no]" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>রোল নম্বর <span style="color: red;">*</span></label>
                                    <input type="number" name="education[0][roll_no]" required>
                                </div>
                                <div class="form-group">
                                    <label>ভর্তির তারিখ <span style="color: red;">*</span></label>
                                    <input type="date" name="education[0][admission_date]" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>ভর্তির সেশন <span style="color: red;">*</span></label>
                                    <input type="text" name="education[0][admission_session]" placeholder="যেমন: ২০২০-২০২১" required>
                                </div>
                                <div class="form-group">
                                    <label>পাশের সাল <span style="color: red;">*</span></label>
                                    <input type="date" name="education[0][completion_year]" required>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <button type="button" class="btn btn-primary add-row-btn" onclick="addEducationRow()">+ আরও শিক্ষা যোগ করুন</button>
            </div>

            <!-- 10. Previous Job Experience -->
            <h2>১০। চাকুরির অভিজ্ঞতা (পূর্বে বা বর্তমানে)</h2>
            <div class="dynamic-section">
                <div id="jobs-container">
                    @php $jobs = $oldJobs ?? $user->previousJobExperiences->map(fn($j)=>[
                        'organization_name'=>$j->organization_name,
                        'from_date'=>optional($j->from_date)->format('Y-m-d'),
                        'to_date'=>optional($j->to_date)->format('Y-m-d'),
                        'currently_working'=>$j->currently_working ? 1 : 0,
                        'reason_for_left'=>$j->reason_for_left,
                    ])->toArray(); @endphp
                    @forelse($jobs as $i => $job)
                        <div class="dynamic-row job-row">
                            @if($i>0)<button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ ডিলিট</button>@endif
                            <div class="form-group">
                                <label>প্রতিষ্ঠানের নাম</label>
                                <input type="text" name="previous_jobs[{{ $i }}][organization_name]" value="{{ $job['organization_name'] ?? '' }}" placeholder="প্রতিষ্ঠানের নাম লিখুন">
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>শুরুর তারিখ</label>
                                    <input type="date" name="previous_jobs[{{ $i }}][from_date]" value="{{ $job['from_date'] ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label>শেষ তারিখ</label>
                                    <input type="date" name="previous_jobs[{{ $i }}][to_date]" value="{{ $job['to_date'] ?? '' }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="previous_jobs[{{ $i }}][currently_working]" value="1" onchange="toggleJobToDate(this)" {{ !empty($job['currently_working']) ? 'checked' : '' }}> বর্তমানে কর্মরত আছি
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>চাকুরি ছাড়ার কারণ</label>
                                    <input type="text" name="previous_jobs[{{ $i }}][reason_for_left]" value="{{ $job['reason_for_left'] ?? '' }}" placeholder="কারণ">
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="dynamic-row job-row">
                            <button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ মুছুন</button>
                            <div class="form-group">
                                <label>প্রতিষ্ঠানের নাম</label>
                                <input type="text" name="previous_jobs[0][organization_name]" placeholder="প্রতিষ্ঠানের নাম লিখুন">
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>শুরুর তারিখ</label>
                                    <input type="date" name="previous_jobs[0][from_date]">
                                </div>
                                <div class="form-group">
                                    <label>শেষ তারিখ</label>
                                    <input type="date" name="previous_jobs[0][to_date]">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="previous_jobs[0][currently_working]" value="1" onchange="toggleJobToDate(this)"> বর্তমানে কর্মরত আছি
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>চাকুরি ছাড়ার কারণ</label>
                                    <input type="text" name="previous_jobs[0][reason_for_left]" placeholder="কারণ (যদি থাকে)">
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <button type="button" class="btn btn-primary add-row-btn" onclick="addJobRow()">+ আরও চাকুরি যোগ করুন</button>
            </div>
           
            <div class="row">
                <div class="form-group">
                    <label>সেনাবাহিনীতে চাকুরী করিয়াছেন কিনা?</label>
                    @php $hasArmy = old('has_worked_with_army', $user->has_worked_with_army ? '1' : '0'); @endphp
                    <select class="" name="has_worked_with_army" id="has_worked_with_army" onchange="toggleWrapper('has_worked_with_army','army_files_wrapper')">
                        <option value="0" {{ $hasArmy=='0' ? 'selected' : '' }}>না</option>
                        <option value="1" {{ $hasArmy=='1' ? 'selected' : '' }}>হ্যাঁ</option>
                    </select>
                </div>
            </div>
            <div class="dynamic-section" id="army_files_wrapper" style="display:none;">
                @if(!empty($user->army_file_paths))
                    <div class="form-group">
                        <label>বিদ্যমান সেনাবাহিনী নথি</label>
                        <ul>
                            @foreach($user->army_file_paths as $i => $path)
                                <li><a href="{{ asset($path) }}" target="_blank">বর্তমান নথি দেখুন {{ count($user->army_file_paths) > 1 ? $i+1 : '' }}</a></li>
                            @endforeach
                        </ul>
                        <div class="file-note">নতুন ফাইল আপলোড করলে বিদ্যমান নথি প্রতিস্থাপিত হবে।</div>
                    </div>
                @endif
                <div id="army-files-container">
                    <div class="dynamic-row army-file-row">
                        <button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ মুছুন</button>
                        <div class="form-group">
                            <label>নথি আপলোড করুন (JPG/PNG, সর্বোচ্চ 5 MB)</label>
                            <input type="file" name="army_files[]" accept="image/*">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary add-row-btn" onclick="addArmyFileRow()">+ আরও নথি যোগ করুন</button>
            </div>

            <!-- 11. Freedom Fighter Relation -->
            <h2>১১। মুক্তিযোদ্ধার সম্পর্ক</h2>
            <div class="row">
                <div class="form-group">
                    <label>প্রার্থী মুক্তিযোদ্ধার পুত্র/কন্যা/পুত্র কন্যার পুত্র কন্যা কিনা?</label>
                    @php $isFF = old('is_freedom_fighter_related', $user->is_freedom_fighter_related ? '1' : '0'); @endphp
                    <select name="is_freedom_fighter_related" id="is_freedom_fighter_related" onchange="toggleSection('is_freedom_fighter_related','freedom_fighter_doc_group')">
                        <option value="0" {{ $isFF=='0' ? 'selected' : '' }}>না</option>
                        <option value="1" {{ $isFF=='1' ? 'selected' : '' }}>হ্যাঁ</option>
                    </select>
                </div>
                <div class="form-group" id="freedom_fighter_doc_group" style="display:none;">
                    <label>সত্যায়িত কপি আপলোড করুন (JPG/PNG, সর্বোচ্চ 2 MB)</label>
                    @if($user->freedom_fighter_doc_path)
                        <p class="file-note">বর্তমান: <a href="{{ asset($user->freedom_fighter_doc_path) }}" target="_blank">ফাইল দেখুন</a>। নতুন ফাইল আপলোড করলে প্রতিস্থাপিত হবে।</p>
                    @endif
                    <input type="file" name="freedom_fighter_doc" accept=".pdf,image/*">
                </div>
            </div>

            <!-- 12. Disability -->
            <h2>১২। প্রতিবন্ধিতা</h2>
            <div class="row">
                <div class="form-group">
                    <label>প্রার্থী প্রতিবন্ধী কিনা?</label>
                    @php $hasDis = old('has_disability', $user->has_disability ? '1' : '0'); @endphp
                    <select name="has_disability" id="has_disability" onchange="toggleSection('has_disability','disability_doc_group')">
                        <option value="0" {{ $hasDis=='0' ? 'selected' : '' }}>না</option>
                        <option value="1" {{ $hasDis=='1' ? 'selected' : '' }}>হ্যাঁ</option>
                    </select>
                </div>
                <div class="form-group" id="disability_doc_group" style="display:none;">
                    <label>প্রতিবন্ধী সনদ আপলোড করুন (JPG/PNG, সর্বোচ্চ 2 MB)</label>
                    @if($user->disability_doc_path)
                        <p class="file-note">বর্তমান: <a href="{{ asset($user->disability_doc_path) }}" target="_blank">ফাইল দেখুন</a>। নতুন ফাইল আপলোড করলে প্রতিস্থাপিত হবে।</p>
                    @endif
                    <input type="file" name="disability_doc" accept=".pdf,image/*">
                </div>
            </div>

            <!-- 13. Police Case -->
            <h2>১৩। ফৌজদারী/রাজনৈতিক মামলা</h2>
            <div class="row">
                <div class="form-group">
                    <label>কোন মামলায় গ্রেফতার, অভিযুক্ত বা দন্ডিত হইয়াছেন কিনা?</label>
                    @php $hasCase = old('has_police_case', $user->has_police_case ? '1' : '0'); @endphp
                    <select name="has_police_case" id="has_police_case" onchange="toggleSection('has_police_case','police_case_details_group')">
                        <option value="0" {{ $hasCase=='0' ? 'selected' : '' }}>না</option>
                        <option value="1" {{ $hasCase=='1' ? 'selected' : '' }}>হ্যাঁ</option>
                    </select>
                </div>
                <div class="form-group" id="police_case_details_group" style="display:none;">
                    <label>বিবরণ</label>
                    <textarea name="police_case_details" placeholder="মামলার সম্পূর্ণ বিবরণ লিখুন">{{ old('police_case_details', $user->police_case_details) }}</textarea>
                </div>
            </div>

            <!-- 14. Govt Relatives -->
            <h2>১৪। সরকারী চাকুরিজীবী আত্মীয়-স্বজন</h2>
            <div class="row">
                <div class="form-group">
                    <label>নিকট আত্মীয় স্বজনের কেহ বাংলাদেশ সরকারের চাকুরীতে নিযুক্ত কিনা?</label>
                    @php $hasRel = old('has_govt_relative', $user->has_govt_relative ? '1' : '0'); @endphp
                    <select name="has_govt_relative" id="has_govt_relative" onchange="toggleWrapper('has_govt_relative','relatives-wrapper')">
                        <option value="0" {{ $hasRel=='0' ? 'selected' : '' }}>না</option>
                        <option value="1" {{ $hasRel=='1' ? 'selected' : '' }}>হ্যাঁ</option>
                    </select>
                </div>
            </div>
            <div class="dynamic-section" id="relatives-wrapper" style="display:none;">
                <div id="relatives-container">
                    @php $rels = $oldRelatives ?? $user->govtRelatives->map(fn($r)=>[
                        'relative_name'=>$r->relative_name,
                        'designation'=>$r->designation,
                        'working_place'=>$r->working_place,
                    ])->toArray(); @endphp
                    @forelse($rels as $i => $rel)
                        <div class="dynamic-row relative-row">
                            @if($i>0)<button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ ডিলিট</button>@endif
                            <div class="row">
                                <div class="form-group">
                                    <label>আত্মীয়ের নাম</label>
                                    <input type="text" name="govt_relatives[{{ $i }}][relative_name]" value="{{ $rel['relative_name'] ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label>পদবী</label>
                                    <input type="text" name="govt_relatives[{{ $i }}][designation]" value="{{ $rel['designation'] ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>কর্মস্থল</label>
                                <input type="text" name="govt_relatives[{{ $i }}][working_place]" value="{{ $rel['working_place'] ?? '' }}">
                            </div>
                        </div>
                    @empty
                        <div class="dynamic-row relative-row">
                            <button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ ডিলিট</button>
                            <div class="row">
                                <div class="form-group">
                                    <label>আত্মীয়ের নাম</label>
                                    <input type="text" name="govt_relatives[0][relative_name]">
                                </div>
                                <div class="form-group">
                                    <label>পদবী</label>
                                    <input type="text" name="govt_relatives[0][designation]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>কর্মস্থল</label>
                                <input type="text" name="govt_relatives[0][working_place]">
                            </div>
                        </div>
                    @endforelse
                </div>
                <button type="button" class="btn btn-primary add-row-btn" onclick="addRelativeRow()">+ আরও যোগ করুন</button>
            </div>

            <!-- 15. Testimonial -->
            <h2>১৫। চরিত্রগত সার্টিফিকেট (সর্বশেষ শিক্ষা প্রতিষ্ঠান)</h2>
            <div class="form-group">
                <label>চরিত্রগত সার্টিফিকেট আপলোড করুন (JPG/PNG, সর্বোচ্চ 2 MB)</label>
                @if($user->testimonial_file_path)
                    <p class="file-note">বর্তমান: <a href="{{ asset($user->testimonial_file_path) }}" target="_blank">ফাইল দেখুন</a>। নতুন ফাইল আপলোড করলে প্রতিস্থাপিত হবে।</p>
                @endif
                <input type="file" name="testimonial_file" accept=".pdf,image/*">
            </div>

            <!-- 16. Witness / Reference -->
            <h2>১৬। সাক্ষ্যদাতা / প্রমাণপত্রদাতা (দুই জন)</h2>
            <div class="dynamic-section">
                @php $wit = $oldWitnesses ?? $user->witnesses->map(fn($w)=>['name'=>$w->name,'address'=>$w->address])->toArray(); @endphp
                @for($i=0;$i<2;$i++)
                    <div class="dynamic-row">
                        <div class="row">
                            <div class="form-group">
                                <label>ব্যক্তি {{ $i+1 }} এর নাম</label>
                                <input type="text" name="witnesses[{{ $i }}][name]" value="{{ $wit[$i]['name'] ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>ব্যক্তি {{ $i+1 }} এর ঠিকানা</label>
                                <input type="text" name="witnesses[{{ $i }}][address]" value="{{ $wit[$i]['address'] ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- 17. Marital Status -->
            <h2>১৭। বৈবাহিক অবস্থা</h2>
            <div class="row">
                <div class="form-group">
                    <label>প্রার্থী বিবাহিত কিনা?</label>
                    @php $married = old('is_married', $user->is_married ? '1' : '0'); @endphp
                    <select class="select-control" name="is_married" id="is_married" onchange="toggleSection('is_married','partner_nationality_group')">
                        <option value="0" {{ $married=='0' ? 'selected' : '' }}>অবিবাহিত</option>
                        <option value="1" {{ $married=='1' ? 'selected' : '' }}>বিবাহিত</option>
                    </select>
                </div>
                <div class="form-group" id="partner_nationality_group" style="display:none;">
                    <label>জীবনসঙ্গীর জাতীয়তা</label>
                    <input type="text" name="partner_nationality" value="{{ old('partner_nationality', $user->partner_nationality) }}" placeholder="জীবনসঙ্গীর জাতীয়তা লিখুন">
                </div>
            </div>

            <!-- 19. Candidate signature -->
            <h2>১৯। প্রার্থীর স্বাক্ষর (১২০x৮০ পিক্সেল, সর্বোচ্চ ৫০ kb)</h2>
            <div class="form-group">
                <label>স্বাক্ষর ও তারিখসহ আপলোড করুন (JPG/PNG)</label>
                @if($user->signature_file_path)
                    <p class="file-note">বর্তমান: <a href="{{ asset($user->signature_file_path) }}" target="_blank">স্বাক্ষর দেখুন</a>। নতুন ফাইল আপলোড করলে প্রতিস্থাপিত হবে।</p>
                @endif
                <input type="file" name="signature_file" accept="image/png,image/jpeg">
            </div>

            <!-- Agreement (optional for edit) -->
            <div class="form-group">
                <label>
                    <input type="checkbox" id="agree_terms" name="agree_terms" value="1" onchange="toggleSubmit()" {{ old('agree_terms', 1) ? 'checked' : '' }}> প্রার্থীর প্রদত্ত তথ্য সঠিক এবং আমি এই তথ্যের জন্য দায়ী
                </label>
            </div>

            <!-- Submit Button -->
            <div class="submit-section">
                <button type="submit" id="submitBtn" class="btn btn-success">তথ্য হালনাগাদ করুন</button>
            </div>
        </form>
    </div>

    <script>
        // Initialize counters based on existing rows
        let educationCount = document.querySelectorAll('.education-row').length || 1;
        let stayCount = document.querySelectorAll('.stay-row').length || 1;
        let jobCount = document.querySelectorAll('.job-row').length || 1;
        let relativeCount = document.querySelectorAll('.relative-row').length || 1;

        function addEducationRow() {
            const container = document.getElementById('education-container');
            const newRow = document.createElement('div');
            newRow.className = 'dynamic-row education-row';
            newRow.innerHTML = `
                <button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ ডিলিট</button>
                <div class="form-group">
                    <label>বিদ্যালয় / মহাবিদ্যালয় / বিশ্ববিদ্যালয়ের নাম <span style="color: red;">*</span></label>
                    <input type="text" name="education[${educationCount}][institution_name]" required>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label>পাসকৃত পরীক্ষার নাম <span style="color: red;">*</span></label>
                        <input type="text" name="education[${educationCount}][degree_name]" required>
                    </div>
                    <div class="form-group">
                        <label>রেজিস্ট্রেশন নম্বর <span style="color: red;">*</span></label>
                        <input type="text" name="education[${educationCount}][reg_no]" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label>রোল নম্বর <span style="color: red;">*</span></label>
                        <input type="number" name="education[${educationCount}][roll_no]" required>
                    </div>
                    <div class="form-group">
                        <label>ভর্তির তারিখ <span style="color: red;">*</span></label>
                        <input type="date" name="education[${educationCount}][admission_date]" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label>ভর্তির সেশন <span style="color: red;">*</span></label>
                        <input type="text" name="education[${educationCount}][admission_session]" placeholder="যেমন: ২০২০-২০২১" required>
                    </div>
                    <div class="form-group">
                        <label>পাশের সাল <span style="color: red;">*</span></label>
                        <input type="date" name="education[${educationCount}][completion_year]" required>
                    </div>
                </div>
            `;
            container.appendChild(newRow);
            educationCount++;
        }

        function addStayRow() {
            const container = document.getElementById('stay-container');
            const newRow = document.createElement('div');
            newRow.className = 'dynamic-row stay-row';
            newRow.innerHTML = `
                <button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ ডিলিট</button>
                <div class="form-group">
                    <label>ঠিকানার বিবরণ <span style="color: red;">*</span></label>
                    <textarea name="stays[${stayCount}][address_details]" required></textarea>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label>শুরুর তারিখ <span style="color: red;">*</span></label>
                        <input type="date" name="stays[${stayCount}][from_date]" required>
                    </div>
                    <div class="form-group">
                        <label>শেষ তারিখ <span style="color: red;">*</span></label>
                        <input type="date" name="stays[${stayCount}][to_date]" required>
                    </div>
                </div>
            `;
            container.appendChild(newRow);
            stayCount++;
        }

        function addJobRow() {
            const container = document.getElementById('jobs-container');
            const newRow = document.createElement('div');
            newRow.className = 'dynamic-row job-row';
            newRow.innerHTML = `
                <button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ ডিলিট</button>
                <div class="form-group">
                    <label>প্রতিষ্ঠানের নাম</label>
                    <input type="text" name="previous_jobs[${jobCount}][organization_name]" placeholder="প্রতিষ্ঠানের নাম লিখুন">
                </div>
                <div class="row">
                    <div class="form-group">
                        <label>শুরুর তারিখ</label>
                        <input type="date" name="previous_jobs[${jobCount}][from_date]">
                    </div>
                    <div class="form-group">
                        <label>শেষ তারিখ</label>
                        <input type="date" name="previous_jobs[${jobCount}][to_date]">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="previous_jobs[${jobCount}][currently_working]" value="1" onchange="toggleJobToDate(this)"> বর্তমানে কর্মরত আছি
                        </label>
                    </div>
                    <div class="form-group">
                        <label>চাকুরি ছাড়ার কারণ</label>
                        <input type="text" name="previous_jobs[${jobCount}][reason_for_left]" placeholder="কারণ">
                    </div>
                </div>
            `;
            container.appendChild(newRow);
            jobCount++;
        }

        function addRelativeRow() {
            const container = document.getElementById('relatives-container');
            const newRow = document.createElement('div');
            newRow.className = 'dynamic-row relative-row';
            newRow.innerHTML = `
                <button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ ডিলিট</button>
                <div class="row">
                    <div class="form-group">
                        <label>আত্মীয়ের নাম</label>
                        <input type="text" name="govt_relatives[${relativeCount}][relative_name]">
                    </div>
                    <div class="form-group">
                        <label>পদবী</label>
                        <input type="text" name="govt_relatives[${relativeCount}][designation]">
                    </div>
                </div>
                <div class="form-group">
                    <label>কর্মস্থল</label>
                    <input type="text" name="govt_relatives[${relativeCount}][working_place]">
                </div>
            `;
            container.appendChild(newRow);
            relativeCount++;
        }

        function addArmyFileRow() {
            const container = document.getElementById('army-files-container');
            const newRow = document.createElement('div');
            newRow.className = 'dynamic-row army-file-row';
            newRow.innerHTML = `
                <button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ ডিলিট</button>
                <div class="form-group">
                    <label>নথি আপলোড করুন (JPG/PNG, সর্বোচ্চ 5 MB)</label>
                    <input type="file" name="army_files[]" accept=".jpg,.jpeg,.png,.webp">
                </div>
            `;
            container.appendChild(newRow);
        }

        function removeRow(button) { button.parentElement.remove(); }

        function toggleSection(selectId, targetId) {
            const val = document.getElementById(selectId).value;
            const el = document.getElementById(targetId);
            if (!el) return;
            if (val === '1') {
                el.style.display = 'block';
                // Enable all inputs when shown
                el.querySelectorAll('input, textarea, select').forEach(input => input.disabled = false);
            } else {
                el.style.display = 'none';
                // Disable all inputs when hidden so they won't be submitted
                el.querySelectorAll('input, textarea, select').forEach(input => input.disabled = true);
            }
        }
        
        function toggleWrapper(selectId, wrapperId) {
            const val = document.getElementById(selectId).value;
            const el = document.getElementById(wrapperId);
            if (!el) return;
            if (val === '1') {
                el.style.display = 'block';
                // Enable all inputs when shown
                el.querySelectorAll('input, textarea, select').forEach(input => input.disabled = false);
            } else {
                el.style.display = 'none';
                // Disable all inputs when hidden so they won't be submitted
                el.querySelectorAll('input, textarea, select').forEach(input => input.disabled = true);
            }
        }
        
        function toggleSubmit() { const agree = document.getElementById('agree_terms'); document.getElementById('submitBtn').disabled = !agree.checked; }
        function toggleJobToDate(checkbox) { const row = checkbox.closest('.job-row'); const toDate = row.querySelector('input[name$="[to_date]"]'); if (checkbox.checked) { toDate.value=''; toDate.disabled=true; } else { toDate.disabled=false; } }

        // initialize toggles on load
        toggleSection('is_freedom_fighter_related','freedom_fighter_doc_group');
        toggleSection('has_disability','disability_doc_group');
        toggleSection('has_police_case','police_case_details_group');
        toggleWrapper('has_govt_relative','relatives-wrapper');
        toggleWrapper('has_worked_with_army','army_files_wrapper');
        toggleSection('is_married','partner_nationality_group');
    </script>
</body>
</html>
