<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>প্রাক চাকুরি বৃত্তান্ত যাচাই ফরম</title>
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
        }
        h2 {
            color: #444;
            margin-top: 30px;
            margin-bottom: 15px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="tel"],
        textarea {
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
            background-color: #fff3cd;
            color: #856404;
            border: 2px solid #ffc107;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
        }
    </style>
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;600;700&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1>"প্রাক চাকুরি বৃত্তান্ত যাচাই ফরম"</h1>

        <div class="instruction-banner">
            ⚠️ দয়া করে সমস্ত তথ্য বাংলায় লিখুন ⚠️
        </div>


        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
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

    <form action="{{ route('users.store') }}" method="POST" id="verificationForm" enctype="multipart/form-data">
            @csrf


            <h2>প্রার্থীর অফিস আইডি ও মোবাইল নম্বর</h2>

            <div class="row">
                <div class="form-group">
                    <label for="employee_id"> প্রার্থীর অফিস আইডি <span style="color: red;">*</span></label>
                    <input type="number" placeholder="যেমন: 202200XXX" name="employee_id" id="employee_id" value="{{ old('employee_id') }}" required>
                    @error('employee_id')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mobile_number">মোবাইল নম্বর <span style="color: red;">*</span></label>
                    <input type="tel" placeholder="01XXX-XXXXXX" name="mobile_number" id="mobile_number" value="{{ old('mobile_number') }}" required>
                    @error('mobile_number')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <h2>ব্যক্তিগত তথ্য</h2>

            <div class="row">               
                <div class="form-group">
                    <label for="designation">পদবী (অফিস কর্তৃক পূরণীয়) <span style="color: red;">*</span></label>
                    <input type="text" placeholder="পদবী লিখুন" name="designation" id="designation" value="{{ old('designation') }}" required>
                    @error('designation')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="full_name">১। প্রার্থীর পূর্ণ নাম (ডাক নামসহ স্পষ্টাক্ষরে) <span style="color: red;">*</span></label>
                    <input type="text" placeholder="পূর্ণ নাম (ডাক নামসহ) লিখুন" name="full_name" id="full_name" value="{{ old('full_name') }}" required>
                    @error('full_name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="nationality">২। জাতীয়তা <span style="color: red;">*</span></label>
                    <input type="text" placeholder="জাতীয়তা লিখুন" name="nationality" id="nationality" value="{{ old('nationality') }}" required>
                    @error('nationality')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fathers_name_design_nation">৩। পিতার পূর্ণ নাম ও (চাকুরীরত থাকিলে) পদের নাম ও জাতীয়তা <span style="color: red;">*</span></label>
                    <input type="text" placeholder="পিতার নাম, পদবী ও জাতীয়তা লিখুন" name="fathers_name_design_nation" id="fathers_name_design_nation" value="{{ old('fathers_name_design_nation') }}" required>
                    @error('fathers_name_design_nation')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="permanent_address_details">৪। স্থায়ী ঠিকানা (গ্রাম, ডাকঘর, থানা ও জেলা) <span style="color: red;">*</span></label>
                <textarea name="permanent_address_details" id="permanent_address_details" placeholder="গ্রাম, ডাকঘর, থানা ও জেলা লিখুন" required>{{ old('permanent_address_details') }}</textarea>
                @error('permanent_address_details')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="present_address_details">৫। বর্তমান বাসস্থানের ঠিকানা <span style="color: red;">*</span></label>
                <textarea name="present_address_details" id="present_address_details" placeholder="বর্তমান ঠিকানার সম্পূর্ণ বিবরণ লিখুন" required>{{ old('present_address_details') }}</textarea>
                @error('present_address_details')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Last 5 Years Stay Details Section -->
            <h2>৬। প্রার্থী যেসব স্থানে বিগত পাঁচ বছরে ছয় মাসের অধিক অবস্থান করেছেন সেই সব স্থানের ঠিকানা</h2>
            <div class="dynamic-section">
                <div id="stay-container">
                    <div class="dynamic-row stay-row">
                        <div class="form-group">
                            <label>ঠিকানার বিবরণ <span style="color: red;">*</span></label>
                            <textarea name="stays[0][address_details]" placeholder="সম্পূর্ণ ঠিকানা লিখুন" required>{{ old('stays.0.address_details') }}</textarea>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label>তারিখ হইতে <span style="color: red;">*</span></label>
                                <input type="date" name="stays[0][from_date]" value="{{ old('stays.0.from_date') }}" required>
                            </div>
                            <div class="form-group">
                                <label>তারিখ পর্যন্ত <span style="color: red;">*</span></label>
                                <input type="date" name="stays[0][to_date]" value="{{ old('stays.0.to_date') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary add-row-btn" onclick="addStayRow()">+ আরও যোগ করুন</button>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="birth_date">৭। জন্ম তারিখ <span style="color: red;">*</span></label>
                    <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" required>
                    @error('birth_date')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="birth_place">৮। জন্ম স্থান (ডাকঘর, থানা/উপজেলা, জেলা) <span style="color: red;">*</span></label>
                    <input type="text" placeholder="জন্ম স্থান লিখুন" name="birth_place" id="birth_place" value="{{ old('birth_place') }}" required>
                    @error('birth_place')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            

            <!-- Education Details Section -->
            <h2>৯। শিক্ষাগত যোগ্যতা (১৫ বৎসর বয়স হইতে)</h2>
            <div class="dynamic-section">
                <div id="education-container">
                    <div class="dynamic-row education-row">
                        <div class="form-group">
                            <label>বিদ্যালয় / মহাবিদ্যালয় / বিশ্ববিদ্যালয়ের নাম <span style="color: red;">*</span></label>
                            <input type="text" placeholder="প্রতিষ্ঠানের নাম লিখুন" name="education[0][institution_name]" value="{{ old('education.0.institution_name') }}" required>
                        </div>
                        
                        <div class="row">
                            <div class="form-group">
                                <label>ডিগ্রির নাম <span style="color: red;">*</span></label>
                                <input type="text" placeholder="এস.এস.সি / এইচ.এস.সি / স্নাতক / মাস্টার্স" name="education[0][degree_name]" value="{{ old('education.0.degree_name') }}" required>
                            </div>
                            <div class="form-group">
                                <label>রেজিস্ট্রেশন নম্বর <span style="color: red;">*</span></label>
                                <input type="text" placeholder="রেজিস্ট্রেশন নম্বর লিখুন" name="education[0][reg_no]" value="{{ old('education.0.reg_no') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label>রোল নম্বর <span style="color: red;">*</span></label>
                                <input type="number" placeholder="রোল নম্বর লিখুন" name="education[0][roll_no]" value="{{ old('education.0.roll_no') }}" required>
                            </div>
                            <div class="form-group">
                                <label>ভর্তির তারিখ <span style="color: red;">*</span></label>
                                <input type="date" name="education[0][admission_date]" value="{{ old('education.0.admission_date') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label>ভর্তির সেশন <span style="color: red;">*</span></label>
                                <input type="text" placeholder="যেমন: ২০২০-২০২১" name="education[0][admission_session]" value="{{ old('education.0.admission_session') }}" required>
                            </div>
                            <div class="form-group">
                                <label>পরিত্যাগের তারিখ / বৎসর <span style="color: red;">*</span></label>
                                <input type="date" name="education[0][completion_year]" value="{{ old('education.0.completion_year') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary add-row-btn" onclick="addEducationRow()">+ আরও শিক্ষা যোগ করুন</button>
            </div>

            <!-- 10. Job Experience -->
            <h2>১০। চাকুরির অভিজ্ঞতা (পূর্বে বা বর্তমানে)</h2>
            <div class="dynamic-section">
                <div id="jobs-container">
                    <div class="dynamic-row job-row">
                        <button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ মুছুন</button>
                        <div class="form-group">
                            <label>নিয়োগকারী অফিস / ব্যবসা প্রতিষ্ঠান এর নাম</label>
                            <input type="text" placeholder="প্রতিষ্ঠানের নাম লিখুন" name="previous_jobs[0][organization_name]" value="{{ old('previous_jobs.0.organization_name') }}" required>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label>তারিখ হইতে</label>
                                <input type="date" name="previous_jobs[0][from_date]" value="{{ old('previous_jobs.0.from_date') }}" required>
                            </div>
                            <div class="form-group">
                                <label>তারিখ পর্যন্ত</label>
                                <input type="date" name="previous_jobs[0][to_date]" value="{{ old('previous_jobs.0.to_date') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="previous_jobs[0][currently_working]" value="1" onchange="toggleJobToDate(this)" {{ old('previous_jobs.0.currently_working') ? 'checked' : '' }}> বর্তমানে কর্মরত
                                </label>
                            </div>
                            <div class="form-group">
                                <label>পরিত্যাগের কারণ</label>
                                <input type="text" placeholder="পরিত্যাগের কারণ লিখুন (প্রযোজ্য হলে)" name="previous_jobs[0][reason_for_left]" value="{{ old('previous_jobs.0.reason_for_left') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary add-row-btn" onclick="addJobRow()">+ আরও চাকুরি যোগ করুন</button>
            </div>

            <!-- 10A. Worked with Army -->
            <h2>১০ (ক) । প্রার্থী সেনাবাহিনীতে চাকুরী করিয়াছেন কিনা?</h2>
            <div class="row">
                <div class="form-group">
                    <label>সেনাবাহিনীতে চাকুরী করিয়াছেন কিনা?</label>
                    <select name="has_worked_with_army" id="has_worked_with_army" onchange="toggleWrapper('has_worked_with_army','army_files_wrapper')">
                        <option value="0" {{ old('has_worked_with_army', '0') == '0' ? 'selected' : '' }}>না</option>
                        <option value="1" {{ old('has_worked_with_army') == '1' ? 'selected' : '' }}>হ্যাঁ</option>
                    </select>
                </div>
            </div>
            <div class="dynamic-section" id="army_files_wrapper" style="display:none;">
                <div id="army-files-container">
                    <div class="dynamic-row army-file-row">
                        <button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ মুছুন</button>
                        <div class="form-group">
                            <label>নথি আপলোড করুন </label>
                            <input type="file" name="army_files[]" accept=".pdf,image/*">
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
                    <select name="is_freedom_fighter_related" id="is_freedom_fighter_related" onchange="toggleSection('is_freedom_fighter_related','freedom_fighter_doc_group')">
                        <option value="0" {{ old('is_freedom_fighter_related', '0') == '0' ? 'selected' : '' }}>না</option>
                        <option value="1" {{ old('is_freedom_fighter_related') == '1' ? 'selected' : '' }}>হ্যাঁ</option>
                    </select>
                </div>
                <div class="form-group" id="freedom_fighter_doc_group" style="display:none;">
                    <label>সত্যায়িত কপি আপলোড করুন (JPG/PNG)</label>
                    <input type="file" name="freedom_fighter_doc" accept=".pdf,image/*">
                </div>
            </div>

            <!-- 12. Disability -->
            <h2>১২। প্রতিবন্ধিতা</h2>
            <div class="row">
                <div class="form-group">
                    <label>প্রার্থী প্রতিবন্ধী কিনা?</label>
                    <select name="has_disability" id="has_disability" onchange="toggleSection('has_disability','disability_doc_group')">
                        <option value="0" {{ old('has_disability', '0') == '0' ? 'selected' : '' }}>না</option>
                        <option value="1" {{ old('has_disability') == '1' ? 'selected' : '' }}>হ্যাঁ</option>
                    </select>
                </div>
                <div class="form-group" id="disability_doc_group" style="display:none;">
                    <label>প্রতিবন্ধী সনদ আপলোড করুন (JPG/PNG)</label>
                    <input type="file" name="disability_doc" accept=".pdf,image/*">
                </div>
            </div>

            <!-- 13. Police Case -->
            <h2>১৩। ফৌজদারী/রাজনৈতিক মামলা</h2>
            <div class="row">
                <div class="form-group">
                    <label>কোন মামলায় গ্রেফতার, অভিযুক্ত বা দন্ডিত হইয়াছেন কিনা?</label>
                    <select name="has_police_case" id="has_police_case" onchange="toggleSection('has_police_case','police_case_details_group')">
                        <option value="0" {{ old('has_police_case', '0') == '0' ? 'selected' : '' }}>না</option>
                        <option value="1" {{ old('has_police_case') == '1' ? 'selected' : '' }}>হ্যাঁ</option>
                    </select>
                </div>
                <div class="form-group" id="police_case_details_group" style="display:none;">
                    <label>বিবরণ</label>
                    <textarea name="police_case_details" placeholder="মামলার সম্পূর্ণ বিবরণ লিখুন">{{ old('police_case_details') }}</textarea>
                </div>
            </div>

            <!-- 14. Govt Relatives (Dynamic) -->
            <h2>১৪। সরকারী চাকুরিজীবী আত্মীয়-স্বজন</h2>
            <div class="row">
                <div class="form-group">
                    <label>নিকট আত্মীয় স্বজনের কেহ বাংলাদেশ সরকারের চাকুরীতে নিযুক্ত কিনা?</label>
                    <select name="has_govt_relative" id="has_govt_relative" onchange="toggleWrapper('has_govt_relative','relatives-wrapper')">
                        <option value="0" {{ old('has_govt_relative', '0') == '0' ? 'selected' : '' }}>না</option>
                        <option value="1" {{ old('has_govt_relative') == '1' ? 'selected' : '' }}>হ্যাঁ</option>
                    </select>
                </div>
            </div>
            <div class="dynamic-section" id="relatives-wrapper" style="display:none;">
                <div id="relatives-container">
                    <div class="dynamic-row relative-row">
                        <button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ মুছুন</button>
                        <div class="row">
                            <div class="form-group">
                                <label>আত্মীয়-স্বজনের নাম</label>
                                <input type="text" placeholder="নাম লিখুন" name="govt_relatives[0][relative_name]" value="{{ old('govt_relatives.0.relative_name') }}">
                            </div>
                            <div class="form-group">
                                <label>পদের নাম</label>
                                <input type="text" placeholder="পদবী লিখুন" name="govt_relatives[0][designation]" value="{{ old('govt_relatives.0.designation') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>কর্মস্থল</label>
                            <input type="text" placeholder="কর্মস্থল লিখুন" name="govt_relatives[0][working_place]" value="{{ old('govt_relatives.0.working_place') }}">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary add-row-btn" onclick="addRelativeRow()">+ আরও যোগ করুন</button>
            </div>

            <!-- 15. Testimonial from last educational institute -->
            <h2>১৫। চরিত্রগত সার্টিফিকেট (সর্বশেষ শিক্ষা প্রতিষ্ঠান)</h2>
            <div class="form-group">
                <label>চরিত্রগত সার্টিফিকেট আপলোড করুন (JPG/PNG)</label>
                <input type="file" name="testimonial_file" accept=".pdf,image/*">
            </div>

            <!-- 16. Witness / Reference (Two Persons) -->
            <h2>১৬। সাক্ষ্যদাতা / প্রমাণপত্রদাতা (দুই জন)</h2>
            <div class="dynamic-section">
                <div class="dynamic-row">
                    <div class="row">
                        <div class="form-group">
                            <label>প্রথম ব্যক্তির নাম</label>
                            <input type="text" placeholder="নাম লিখুন" name="witnesses[0][name]" value="{{ old('witnesses.0.name') }}">
                        </div>
                        <div class="form-group">
                            <label>প্রথম ব্যক্তির ঠিকানা</label>
                            <input type="text" placeholder="ঠিকানা লিখুন" name="witnesses[0][address]" value="{{ old('witnesses.0.address') }}">
                        </div>
                    </div>
                </div>
                <div class="dynamic-row">
                    <div class="row">
                        <div class="form-group">
                            <label>দ্বিতীয় ব্যক্তির নাম</label>
                            <input type="text" placeholder="নাম লিখুন" name="witnesses[1][name]" value="{{ old('witnesses.1.name') }}">
                        </div>
                        <div class="form-group">
                            <label>দ্বিতীয় ব্যক্তির ঠিকানা</label>
                            <input type="text" placeholder="ঠিকানা লিখুন" name="witnesses[1][address]" value="{{ old('witnesses.1.address') }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 17. Marital Status -->
            <h2>১৭। বৈবাহিক অবস্থা</h2>
            <div class="row">
                <div class="form-group">
                    <label>প্রার্থী বিবাহিত কিনা?</label>
                    <select name="is_married" id="is_married" onchange="toggleSection('is_married','partner_nationality_group')">
                        <option value="0" {{ old('is_married', '0') == '0' ? 'selected' : '' }}>অবিবাহিত</option>
                        <option value="1" {{ old('is_married') == '1' ? 'selected' : '' }}>বিবাহিত</option>
                    </select>
                </div>
                <div class="form-group" id="partner_nationality_group" style="display:none;">
                    <label>জীবনসঙ্গীর জাতীয়তা</label>
                    <input type="text" placeholder="জীবনসঙ্গীর জাতীয়তা লিখুন" name="partner_nationality" value="{{ old('partner_nationality') }}">
                </div>
            </div>

            <!-- 19. Candidate signature -->
            <h2>১৯। প্রার্থীর স্বাক্ষর (১২০x৮০ পিক্সেল, < ৫০ kb)</h2>
            <div class="form-group">
                <label>স্বাক্ষর ও তারিখসহ আপলোড করুন (JPG/PNG)</label>
                <input type="file" name="signature_file" accept="image/png,image/jpeg">
            </div>

            <!-- Agreement -->
            <div class="form-group">
                <label>
                    <input type="checkbox" id="agree_terms" name="agree_terms" value="1" onchange="toggleSubmit()" {{ old('agree_terms') ? 'checked' : '' }}> প্রার্থীর প্রদত্ত তথ্য সঠিক এবং আমি এই তথ্যের জন্য দায়ী
                </label>
            </div>

            <!-- Submit Button -->
            <div class="submit-section">
                <button type="submit" id="submitBtn" class="btn btn-success" disabled> ফরম জমা দিন</button>
            </div>
        </form>
    </div>

    <script>
        let educationCount = 1;
        let stayCount = 1;
        let jobCount = 1;
        let relativeCount = 1;

        function addEducationRow() {
            const container = document.getElementById('education-container');
            const newRow = document.createElement('div');
            newRow.className = 'dynamic-row education-row';
            newRow.innerHTML = `
                <button type="button" class="btn btn-danger remove-btn" onclick="removeRow(this)">✕ ডিলিট</button>
                
                <div class="form-group">
                    <label>প্রতিষ্ঠানের নাম <span style="color: red;">*</span></label>
                    <input type="text" placeholder="প্রতিষ্ঠানের নাম লিখুন" name="education[${educationCount}][institution_name]" required>
                </div>
                
                <div class="row">
                    <div class="form-group">
                        <label>ডিগ্রির নাম <span style="color: red;">*</span></label>
                        <input type="text" placeholder="ডিগ্রির নাম লিখুন" name="education[${educationCount}][degree_name]" required>
                    </div>
                    <div class="form-group">
                        <label>রেজিস্ট্রেশন নম্বর <span style="color: red;">*</span></label>
                        <input type="text" placeholder="রেজিস্ট্রেশন নম্বর লিখুন" name="education[${educationCount}][reg_no]" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label>রোল নম্বর <span style="color: red;">*</span></label>
                        <input type="number" placeholder="রোল নম্বর লিখুন" name="education[${educationCount}][roll_no]" required>
                    </div>
                    <div class="form-group">
                        <label>ভর্তির তারিখ <span style="color: red;">*</span></label>
                        <input type="date" name="education[${educationCount}][admission_date]" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label>ভর্তির সেশন <span style="color: red;">*</span></label>
                        <input type="text" placeholder="যেমন: ২০২০-২০২১" name="education[${educationCount}][admission_session]" required>
                    </div>
                    <div class="form-group">
                        <label>পরিত্যাগের তারিখ / বৎসর <span style="color: red;">*</span></label>
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
                    <textarea name="stays[${stayCount}][address_details]" placeholder="সম্পূর্ণ ঠিকানা লিখুন" required></textarea>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label>তারিখ হইতে <span style="color: red;">*</span></label>
                        <input type="date" name="stays[${stayCount}][from_date]" required>
                    </div>
                    <div class="form-group">
                        <label>তারিখ পর্যন্ত <span style="color: red;">*</span></label>
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
                    <input type="text" placeholder="প্রতিষ্ঠানের নাম লিখুন" name="previous_jobs[${jobCount}][organization_name]">
                </div>
                <div class="row">
                    <div class="form-group">
                        <label>তারিখ হইতে</label>
                        <input type="date" name="previous_jobs[${jobCount}][from_date]">
                    </div>
                    <div class="form-group">
                        <label>তারিখ পর্যন্ত</label>
                        <input type="date" name="previous_jobs[${jobCount}][to_date]">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="previous_jobs[${jobCount}][currently_working]" value="1" onchange="toggleJobToDate(this)"> বর্তমানে কর্মরত
                        </label>
                    </div>
                    <div class="form-group">
                        <label>পরিত্যাগের কারণ</label>
                        <input type="text" placeholder="পরিত্যাগের কারণ লিখুন" name="previous_jobs[${jobCount}][reason_for_left]">
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
                        <label>আত্মীয়-স্বজনের নাম</label>
                        <input type="text" placeholder="নাম লিখুন" name="govt_relatives[${relativeCount}][relative_name]">
                    </div>
                    <div class="form-group">
                        <label>পদের নাম</label>
                        <input type="text" placeholder="পদবী লিখুন" name="govt_relatives[${relativeCount}][designation]">
                    </div>
                </div>
                <div class="form-group">
                    <label>কর্মস্থল</label>
                    <input type="text" placeholder="কর্মস্থল লিখুন" name="govt_relatives[${relativeCount}][working_place]">
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
                    <label>নথি আপলোড করুন </label>
                    <input type="file" name="army_files[]" accept=".pdf,image/*">
                </div>
            `;
            container.appendChild(newRow);
        }

        function removeRow(button) {
            button.parentElement.remove();
        }

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

        function toggleSubmit() {
            const agree = document.getElementById('agree_terms');
            document.getElementById('submitBtn').disabled = !agree.checked;
        }

        function toggleJobToDate(checkbox) {
            const row = checkbox.closest('.job-row');
            const toDate = row.querySelector('input[name$="[to_date]"]');
            if (checkbox.checked) {
                toDate.value = '';
                toDate.disabled = true;
            } else {
                toDate.disabled = false;
            }
        }

        // Form validation before submit
        document.getElementById('verificationForm').addEventListener('submit', function(e) {
            const educationRows = document.querySelectorAll('.education-row').length;
            const stayRows = document.querySelectorAll('.stay-row').length;

            if (educationRows === 0) {
                e.preventDefault();
                alert('Please add at least one education detail.');
                return false;
            }

            if (stayRows === 0) {
                e.preventDefault();
                alert('Please add at least one stay detail.');
                return false;
            }
        });
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