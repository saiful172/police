<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>প্রাক চাকুরি বৃত্তান্ত যাচাই ফরম</title>
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Kalpurush", "Noto Sans Bengali", "Hind Siliguri", "SolaimanLipi", Arial, sans-serif;
            background: #f7f9fb;
            color: #000;
            font-size: 18px;
            padding: 30px;
            line-height: 1.5;
            margin: 0;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            text-align: center;
            font-weight: 600;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px; changed from 12px to 15px
            line-height: 1.6;
            margin: 0 0 10px 0;
            word-wrap: break-word;
            word-break: break-word;
            overflow-wrap: break-word;
        }

        .instructions {
            color: #000;
            margin-bottom: 15px;
        }

        .case-details {
            max-width: 100%;
            word-wrap: break-word;
            word-break: break-word;
            overflow-wrap: break-word;
            white-space: pre-wrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        table,
        table tr,
        table td {
            border: 1px solid #000;
        }

        table td {
            padding: 4px 8px;
            vertical-align: top;
            word-wrap: break-word;
            word-break: break-word;
            overflow-wrap: break-word;
        }

        table td.label {
            font-weight: 600;
        }

        .fw-bold {
            font-weight: 600;
            font-size: 18px;
            margin: 10px 0 5px 0;
        }

        .small-note {
            font-size: 18px;
            color: black;
            margin-top: 5px;
        }        

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-info {
            background-color: #17a2b8;
            color: white;
        }

        .action-buttons {
            margin-top: 30px;
            text-align: center;
        }

        .page-break {
            display: none;
        }

        .divider {
            margin: 20px 0;
            border-top: 1px dashed #000;
        }

        .doc-list {
            list-style: none;
            padding-left: 0;
            margin-top: 10px;
        }

        .doc-list li {
            margin-bottom: 8px;
            padding: 5px;
        }

        .doc-list a {
            color: #007bff;
            text-decoration: none;
        }

        .doc-list a:hover {
            text-decoration: underline;
        }

        @media print {
            body {
                background: #fff;
                padding: 0;      
                font-size: 12px !important;          
            }
            p{
                font-size: 12px !important;
            }
           

            .fw-bold {
                font-size: 12px !important;
            }

            .container {
                box-shadow: none;
                border-radius: 0;
                margin: 0;
                padding: 0;
            }

            .action-buttons {
                display: none;
            }

            .page-break {
                display: block;
                page-break-before: always;
                break-before: page;
                height: 0;
            }

            @page {
                size: A4 portrait;
                margin: 10mm 12mm;
            }

            table,
            table tr,
            table td {
                font-size: 12px !important;
                border: 1px solid #000;
                margin-right: 20px;
            }

            .divider {
                border-top: 1px dashed #000 !important;
            }
           
        }
    </style>
</head>

<body>
    
    <div class="container">
        <h1>"প্রাক চাকুরি বৃত্তান্ত যাচাই ফরম"</h1>
        
        <p class="instructions">সমস্ত দাগগুলির ঠিক উত্তর লিপিবদ্ধ করার জন্য একজন দায়িত্বশীল অফিসার দরখাস্তকারীকে যথাযথভাবে প্রশ্ন করিবেন, কারণ কোন কিছু বাদ গেলে দেরী হওয়ার সম্ভাবনা থাকিতে পারে ও পরিচিতির ক্ষেত্রে বিভ্রান্তির সৃষ্টি হতে পারে।</p>

        <table>
            <tr>
                <td colspan="2">প্রার্থী যে পদে নিযুক্ত হইবেন সেই পদের নাম (অফিস কর্তৃক পূরণীয়) : {{ $user->designation }}</td>
            </tr>
            <tr>
                <td colspan="2" style="font-weight: 900; text-align: center; padding: 6px;">প্রথম ভাগ: (প্রার্থী নিজে পুরণ করিবেন)</td>
            </tr>
            <tr>
                <td colspan="2">১। প্রার্থীর পুরা নাম (ডাক নামসহ স্পষ্টাক্ষরে) : {{ $user->full_name }}</td>
            </tr>
            <tr>
                <td colspan="2">২। জাতীয়তা : {{ $user->nationality }}</td>
            </tr>
            <tr>
                <td colspan="2">৩।  পিতার পুরা নাম ও চাকুরীরত থাকিলে পদের নাম ও জাতীয়তা
                 : {{ $user->fathers_name_design_nation }}</td>
            </tr>
            <tr>
                <td colspan="2">৪।  স্থায়ী ঠিকানা (অর্থাৎ গ্রাম, ডাকঘর, থানা ও জেলা) : {{ $user->permanent_address_details }}</td>
            </tr>
            <tr>
                <td colspan="2">৫। বর্তমান বাসস্থানের ঠিকানা : {{ $user->present_address_details }}</td>
            </tr>
        </table>

        <div class="fw-bold">৬। প্রার্থী যেসব স্থানে বিগত পাঁচ বছরে ছয় মাসের অধিক অবস্থান করেছেন সেই সব স্থানের ঠিকানাঃ</div>
        <table>
            <tr>
                <td class="label" style="width: 50%; text-align: center;">ঠিকানা</td>
                <td class="label" style="width: 25%; text-align: center;">তারিখ হইতে</td>
                <td class="label" style="width: 25%; text-align: center;">তারিখ পর্যন্ত</td>
            </tr>
            @forelse($user->last5YearsStays as $stay)
            <tr>
                <td>{{ $stay->address_details }}</td>
                <td style="text-align: center;">{{ $stay->from_date->format('d/m/Y') }}</td>
                <td style="text-align: center;">{{ $stay->to_date->format('d/m/Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align: center;">কোনো তথ্য নেই।</td>
            </tr>
            @endforelse
        </table>

         <p style="margin-top: 20px;">৭। জন্ম তারিখ (প্রার্থীর মাধ্যমিক স্কুল সার্টিফিকেট/সমমানের পরীক্ষায় উত্তীর্ণ হয়ে থাকিলে উক্ত সার্টিফিকেটে উল্লেখিত সময় লিখিতে হইবে)।</p>
        <p>
            {{ $user->birth_date->format('d/m/Y') }}
        </p>
        <div class="divider"></div>   
        
         <p style="margin-top: 20px;">৮। জন্ম স্থান (ডাকঘর, থানা/উপজেলা, জেলা ইত্যাদি উল্লেখ করিতে হইবে):</p>
        <p>
            {{ $user->birth_place }}
        </p>
        <div class="divider"></div>
        <p>৯। প্রার্থী ১৫ (পনের) বৎসর বয়স হইতে যে সব বিদ্যালয়, মহাবিদ্যালয়ে ও বিশ্ববিদ্যালয় অধ্যায়ন করিয়াছেন সেই সব শিক্ষা প্রতিষ্ঠানের নাম ও  বৎসর উল্লেখ পূর্বক শিক্ষাগত যোগ্যতাঃ
        </p>
        <table style="text-align: center;">
            <tr>
                <td class="label" style="width: 35%;">বিদ্যালয় / মহাবিদ্যালয় / বিশ্ববিদ্যালয়</td>
                <td class="label" style="width: 25%;">এস,এস,সি/ এইচ,এস,সি/ অর্নার্স/ মাষ্টার্স ডিগ্রির রেজি: নম্বর/ রোল নম্বর</td>
                <td class="label" style="width: 20%;">ভর্তির তারিখ / বৎসর / সেশন</td>
                <td class="label" style="width: 20%;">পরিত্যাগের তারিখ / বৎসর</td>
            </tr>
            @forelse($user->educationDetails as $education)
            <tr>
                <td>{{ $education->institution_name }}</td>
                <td>{{ $education->degree_name }} - {{ $education->reg_no }} / {{ $education->roll_no }}</td>
                <td>{{ $education->admission_date->format('d/m/Y') }} / {{ $education->admission_session }}</td>
                <td>{{ $education->completion_year->format('Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center;">কোনো শিক্ষাগত তথ্য নেই।</td>
            </tr>
            @endforelse
        </table>

        <div class="page-break"></div>

        <p style="margin-top: 20px;">১০। কোন সরকারী/আধা-সরকারী/স্বায়ত্তশাসিত/আধা-স্বায়ত্তশাসিত/স্থানীয় সরকারের সংস্থাসহ বেসরকারী প্রতিষ্ঠানে প্রার্থী পূর্বে চাকুরী করে থাকলে/বর্তমানে কর্মরত থাকিলে উহার পূর্ণ বিবরণ ও ঠিকানা এবং সেইগুলি পরিত্যাগের কারণঃ</p>
        <table style="text-align: center;">
            <tr>
                <td class="label" style="width: 30%;">নিয়োগকারী অফিস / ব্যবসা প্রতিষ্ঠান এর নাম</td>
                <td class="label" style="width: 15%;">তারিখ হইতে</td>
                <td class="label" style="width: 15%;">তারিখ পর্যন্ত</td>
                <td class="label" style="width: 15%;">কর্মরত থাকিলে (কর্মরত লিখিতে হইবে)</td>
                <td class="label" style="width: 25%;">পরিত্যাগ করিলে (পরিত্যাগের কারণ)</td>
            </tr>
            @forelse($user->previousJobExperiences as $job)
            <tr>
                <td>{{ $job->organization_name }}</td>
                <td>{{ optional($job->from_date)->format('d/m/Y') }}</td>
                <td>{{ $job->currently_working ? 'বর্তমান' : optional($job->to_date)->format('d/m/Y') }}</td>
                <td>{{ $job->currently_working ? 'কর্মরত' : '' }}</td>
                <td>{{ $job->reason_for_left }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">কোনো চাকুরি তথ্য নেই।</td>
            </tr>
            @endforelse
        </table>

        <p class="instructions">
            বাংলাদেশ সেনাবাহিনীর অধীনে কোন প্রার্থী পূর্বে চাকুরী করে থাকলে অব্যাহতির সার্টিফিকেট, লিপিবদ্ধ চাকুরী মেয়াদ, কি কি দায়িত্ব পালন করেছেন এবং চরিত্র ও আচার ব্যবহার সম্পর্কিত সংশ্লিষ্ট বিবরণীর উল্লেখ করতে হবে।
        </p>

        @if($user->has_worked_with_army)
            <p><strong>সেনাবাহিনীতে চাকুরী:</strong> হ্যাঁ 
                {{-- @if($user->army_file_paths && count($user->army_file_paths) > 0)
                   <a href="{{ asset($user->army_file_paths[0]) }}" target="_blank">সংযুক্ত নথি দেখুন</a>
               @endif --}}
            </p>
            
        @else
            <p class="instructions"><strong>সেনাবাহিনীতে চাকুরী:</strong> না</p>
        @endif

        <p class="instructions">১১। প্রার্থী মুক্তিযোদ্ধার পুত্র/কন্যা/পুত্র কন্যার পুত্র কন্যা কিনা (হ্যাঁ/না): {{ $user->is_freedom_fighter_related ? 'হ্যাঁ' : 'না' }}</p>
        {{-- @if($user->freedom_fighter_doc_path)
        <p><a href="{{ asset($user->freedom_fighter_doc_path) }}" target="_blank">সত্যায়িত কপি দেখুন</a></p>
        @endif --}}

        <p class="small-note">প্রার্থী মুক্তিযোদ্ধা অথবা শহীদ মুক্তিযোদ্ধার পুত্র কন্যা/পুত্র কন্যার পুত্র কন্যা হইলে সেই মর্মে উপযুক্ত কর্তৃপক্ষ কর্তৃক প্রদত্ত পিতা/মাতা/পিতামহের মুক্তিযোদ্ধার সার্টিফিকেট এর সত্যায়িত কপি এবং নিয়োগ বিজ্ঞাপ্তির ৭ নং অনুচেছদের নির্দেশনামতে প্রত্যয়নপত্রসমূহ সংগে দিতে হইবে।</p>

        <p style="margin-top: 15px;">১২। প্রার্থী প্রতিবন্ধী কিনা (হ্যাঁ বা না): {{ $user->has_disability ? 'হ্যাঁ' : 'না' }}</p>
        {{-- @if($user->disability_doc_path)
        <p><a href="{{ asset($user->disability_doc_path) }}" target="_blank">সত্যায়িত প্রতিবন্ধী সনদ দেখুন</a></p>
        @endif --}}
        <p class="small-note">প্রতিবন্ধী কোটার প্রার্থী হলে সংশ্লিষ্ট কর্তৃপক্ষ কর্তৃক প্রদত্ত প্রতিবন্ধী সনদের সত্যায়িত কপি সংগে দিতে হবে।
        <br />টীকাঃ- যথাযথ পদ্ধতিতে তদন্তের মাধ্যমে সংশ্লিষ্ট নিয়োগকারী কর্তৃপক্ষকে সন্তুষ্ট হইতে হইবে যে, উল্লিখিত ভূতপূর্ব সামরিক কর্মচারীদের অব্যাহতি সার্টিফিকেট এবং মুক্তিযোদ্ধার ও প্রতিবন্ধী প্রার্থী কর্তৃক দাখিলকৃত সার্টিফিকেট যথাযথ এবং সন্তোষজনক।
        </p>

        <div class="divider"></div>

        <p>১৩। ফৌজদারী, রাজনৈতিক বা অন্য কোন মামলায় গ্রেফতার, অভিযুক্ত বা দন্ডিত এবং নজর বন্দী বা বহিষ্কৃত হইয়াছেন কিনা; হইয়া থাকলে তারিখসহ পূর্ণ বিবরণ দিতে হবে : {{ $user->has_police_case ? 'হ্যাঁ' : 'না' }}</p>
        @if($user->police_case_details)
            <p class="case-details">
             {{ $user->police_case_details }}
            </p>
        @endif

        <div class="divider"></div>

        <p>১৪। নিকট আত্মীয় স্বজনের কেহ অর্থাৎ ভাই, আপন চাচা, শ্বশুরের দিকের নিকট আতীয় স্বজন বাংলাদেশ সরকারের চাকুরীতে নিযুক্ত থাকিলে পদের নাম ও কর্মস্থল উল্লেখ পূর্বক পূর্ণ বিবরণ : </p>
        <table style="text-align: center;">
            <tr>
                <td class="label" style="width: 35%;">আত্মীয়-স্বজনের নাম</td>
                <td class="label" style="width: 30%;">পদের নাম</td>
                <td class="label" style="width: 35%;">কর্মস্থল</td>
            </tr>
            @if($user->has_govt_relative)
                @forelse($user->govtRelatives as $rel)
                <tr>
                    <td>{{ $rel->relative_name }}</td>
                    <td>{{ $rel->designation }}</td>
                    <td>{{ $rel->working_place }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="text-align: center;">কোনো আত্মীয় তথ্য নেই।</td>
                </tr>
                @endforelse
            @else
                <tr>
                    <td colspan="3" style="text-align: center;">কোনো আত্মীয় তথ্য নেই।</td>
                </tr>
            @endif
        </table>

        <div class="page-break"></div>

        <p style="margin-top: 20px;">১৫। প্রার্থী যে শিক্ষা প্রতিষ্ঠানে সর্বশেষ অধ্যায়ন করিয়াছেন উহার প্রধানের নিকট হইতে একটি চরিত্রগত সার্টিফিকেট দিতে হইবে :</p>
        {{-- <p>
            @if($user->testimonial_file_path)
                <a href="{{ asset($user->testimonial_file_path) }}" target="_blank">সার্টিফিকেট দেখুন</a>
            @else
                সার্টিফিকেট সংযুক্ত নেই
            @endif
        </p> --}}

        <div class="divider"></div>

        <p>১৬।  প্রার্থীর চরিত্র ও পূর্ব পরিচয় সম্পর্কে স্বাক্ষ্য দিতে পারেন কিন্তু প্রার্থীর সহিত আত্বীয়তার সূত্রে আবদ্ধ নহেন এমন দুই ব্যক্তির ঠিকানাসহ নাম (সংসদ সদস্য, প্রথম শ্রেণীর গেজেটেড অফিসার, বিশ্ববিদ্যালয়ের অধ্যাপক, রিডার, সিনিয়র লেকচার ও বেসরকারী মহাবিদ্যালয়ের অধ্যক্ষ্য):</p>
        <table style="text-align: center;">
            <tr>
                <td class="label" style="width: 40%;">নাম</td>
                <td class="label" style="width: 60%;">ঠিকানা</td>
            </tr>
            @forelse($user->witnesses as $wit)
            <tr>
                <td>{{ $wit->name }}</td>
                <td>{{ $wit->address }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="2" style="text-align: center;">কোনো সাক্ষ্যদাতা নেই।</td>
            </tr>
            @endforelse
        </table>

        <p>১৭। বিবাহিত বা অবিবাহিত (বিবাহিত হইলে বা বিবাহের প্রস্তাব থাকিলে, যাহাকে বিবাহ করা হয়েছে বা বিবাহ করার প্রস্তাব রয়েছে তাঁর জাতীয়তা উল্লেখ করিতে হবে): </p>

        <p>{{ $user->is_married ? 'বিবাহিত' : 'অবিবাহিত' }} -   
            @if($user->partner_nationality)
                <strong>জীবনসঙ্গীর জাতীয়তা:</strong> {{ $user->partner_nationality }}
            @endif
        </p>
      

        <p style="margin-top: 20px; font-weight: 600;">আমি শপথপূর্বক বলিতেছি যে, উপরে প্রদত্ত বিবরণ সমূহ আমার জানামতে সঠিক। মিথ্যা তথ্যের জন্য প্রার্থিতা/পরীক্ষা বাতিলসহ আমার বিরুদ্ধে অন্যান্য ব্যবস্থা নেওয়া যাইতে পারে।</p>

        <div style="text-align: right; margin-top: 20px;">
            @if($user->signature_file_path)
            <img src="{{ asset($user->signature_file_path) }}" alt="Signature" style="width: 160px; max-height: 70px; object-fit: contain; margin-bottom: 5px;">
            @endif
            <p style="font-weight: 600;padding-right:30px;">প্রার্থীর স্বাক্ষর ও তারিখ</p>
        </div>

        <div class="divider"></div>

       <div style="display: flex; justify-content: flex-end;">
            <div style="text-align: center; margin-top: 150px; font-weight: 600;">
                প্রেরণকারী অফিসারের স্বাক্ষর ও পদবী<br />
                এবং পুরা ঠিকানা অফিসের নাম ও<br />
                তারিখঃ
            </div>
        </div>

        <div class="page-break"></div>

        <p style="text-align: center; font-weight: 700; text-decoration: underline; margin-top: 50px;">দ্বিতীয় ভাগ:</p>
        <p style="margin-top: 10px;">
            (জেলা স্পেশাল ব্রাঞ্চের পুলিশ সুপারিনটেনডেন্ট/বাংলাদেশ স্পেশাল ব্রাঞ্চের ডেপুটি ইন্সেপেক্টর জেনারেল অব পুলিশ পূরণ করবেন)।
        </p>

        <div class="divider"></div>

        <p>উপযুক্ত</p>
        <p>
            নিম্নোক্ত কারণের জন্য অনুপযুক্তঃ
        </p>
        <p>স্থান <span style="border-bottom: 1px dashed #000; display: inline-block; width: 300px;"></span></p>
        <p>তারিখঃ <span style="border-bottom: 1px dashed #000; display: inline-block; width: 300px;"></span></p>       
         <div style="display: flex; justify-content: flex-end;">
            <div style="text-align: center; margin-top: 150px; font-weight: 600;">
                 <p style="border-top: 1px dashed #000;padding: 5px;">
                পুলিশ সুপারিনটেনডেন্ট, জেলা স্পেশাল ব্রাঞ্চ/<br />ডেপুটি ইনস্পেক্টর জেনারেল অব পুলিশ<br />স্পেশাল ব্রাঞ্চ, বাংলাদেশ।
                </p>
            </div>
        </div>

        <div class="divider"></div>

        <p><strong>টীকা:</strong></p>
        <p> প্রত্যায়নে সংশ্লিষ্ট প্রার্থীর বিরুদ্ধে কোন কিছু না পাওয়া গেলে জেলা
            স্পেশাল ব্রাঞ্চের পুলিশ সুপারিনটেনডেন্ট বাংলাদেশ স্পেশাল ব্রাঞ্চের
            ডেপুটি ইন্সপেক্টর জেনারেল অব পুলিশ জবাবসহ এই ফরমটি প্রেরণকারী কর্তৃপক্ষের 
            নিকট সরাসরি ফেরত পাঠাবেন।

             <p>
                 কিন্তু যদি সংশ্লিষ্ট প্রার্থীর বিরুদ্ধে রেকর্ড এ কোন তথ্য পাওয়া যায় তাহা
            হইলে জেলা স্পেশাল ব্রাঞ্চের পুলিশ সুপারিনটেনডেন্ট বাংলাদেশ স্পেশাল
            ব্রাঞ্চের ডেপুটি ইনস্পেক্টর জেনারেল অব পুলিশ এর মাধ্যমে জবাবসহ এই
            ফরমটি প্রেরণকারী কর্তৃপক্ষের নিকট ফেরত পাঠাবেন।
            </p>

        <p style="text-align: right; margin-top: 80px;">প্রতিস্বাক্ষরিত <span style="font-size: 17px;">--------------------</span><br />ডেপুটি ইন্সপেক্টর জেনারেল অব পুলিশ,<br />স্পেশাল ব্রাঞ্চ, বাংলাদেশ, ঢাকা।</p>

        <!-- Inline attachments: render each attached file on its own printed page after the form -->
        @php
            // Collect possible attachment paths into an ordered array. Keep duplicates out.
            $attachments = [];

            // Army files (may be an array)
            if (!empty($user->army_file_paths) && is_array($user->army_file_paths)) {
                foreach ($user->army_file_paths as $p) {
                    if ($p) $attachments[] = $p;
                }
            }

            // Single-file paths (exclude signature_file_path because signature is shown on the form and shouldn't be printed as a separate page)
            foreach (['freedom_fighter_doc_path', 'disability_doc_path', 'testimonial_file_path'] as $field) {
                if (!empty($user->{$field})) {
                    $attachments[] = $user->{$field};
                }
            }

            // Make unique and preserve order
            $attachments = array_values(array_unique($attachments));
        @endphp

        @foreach($attachments as $filePath)
            <div class="page-break"></div>
            <div style="padding: 10px;">
                @php
                    // Resolve full URL for asset helper in Blade
                    $url = asset($filePath);
                    $lower = strtolower($filePath);
                @endphp

              
                @if(Str::endsWith($lower, ['.pdf']))
                    <div style="text-align:center;">                      
                        <canvas class="pdf-preview" data-pdf-src="{{ $url }}" style="max-width:100%; width:100%; height:auto; border:1px solid #ddd;"></canvas>
                        <noscript>
                            <p>PDF প্রদর্শন করতে জাভাস্ক্রিপ্ট অন করুন অথবা <a href="{{ $url }}" target="_blank">এখানে ডাউনলোড/দেখুন</a></p>
                        </noscript>
                    </div>
                @elseif(Str::endsWith($lower, ['.jpg', '.jpeg', '.png', '.gif', '.bmp', '.webp', '.svg']))
                    <div style="text-align:center;">
                        <img src="{{ $url }}" alt="attachment" style="max-width:100%; height:auto;" />
                    </div>
                @else
                    <p>সংযুক্তি: <a href="{{ $url }}" target="_blank">ডাউনলোড/দেখুন</a></p>
                @endif
            </div>
        @endforeach

        <div class="action-buttons">          
              <button type="button" class="btn btn-info" onclick="window.print()">Print</button>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.172/pdf.min.js"></script>
<script>
    // Ensure pdfjsGlobal is available
    (function(){
        if (!window['pdfjsLib']) return;
        const pdfjsLib = window['pdfjsLib'];
        // Worker config - use CDN worker
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.172/pdf.worker.min.js';

        async function renderPdfToCanvas(url, canvas) {
            try {
                const loadingTask = pdfjsLib.getDocument(url);
                const pdf = await loadingTask.promise;
                const page = await pdf.getPage(1);
                const viewport = page.getViewport({ scale: 1 });

                // Fit width based on container width
                const containerWidth = canvas.clientWidth || canvas.parentElement.clientWidth;
                const scale = (containerWidth / viewport.width) || 1;
                const scaledViewport = page.getViewport({ scale });

                canvas.width = Math.floor(scaledViewport.width);
                canvas.height = Math.floor(scaledViewport.height);

                const ctx = canvas.getContext('2d');
                const renderContext = {
                    canvasContext: ctx,
                    viewport: scaledViewport
                };
                await page.render(renderContext).promise;
            } catch (e) {
                // On error, replace canvas with a download link
                const link = document.createElement('p');
                link.innerHTML = 'PDF প্রদর্শন করা যাচ্ছে না, এখানে <a href="' + url + '" target="_blank">ডাউনলোড/দেখুন</a>';
                canvas.parentNode.replaceChild(link, canvas);
            }
        }

        // Wait for DOM ready
        document.addEventListener('DOMContentLoaded', function(){
            const canvases = document.querySelectorAll('canvas.pdf-preview');
            canvases.forEach(c => {
                const src = c.getAttribute('data-pdf-src');
                if (src) renderPdfToCanvas(src, c);
            });
        });
    })();
</script>
</body>
</html>
