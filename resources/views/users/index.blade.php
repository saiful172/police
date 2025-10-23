<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ব্যবহারকারী তালিকা - পুলিশ ভেরিফিকেশন</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Kalpurush', 'Noto Sans Bengali', 'Hind Siliguri', Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
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
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .header-actions {
            margin-bottom: 20px;
            text-align: right;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .btn-info {
            background-color: #17a2b8;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
        }
        .search-input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 300px;
            font-size: 14px;
        }
        .search-input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0,123,255,0.3);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow-x: auto;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            white-space: nowrap;
        }
        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .no-data {
            text-align: center;
            padding: 40px;
            color: #666;
        }

        /* ✅ Responsive Design */

        @media (max-width: 992px) {
            body {
                padding: 15px;
            }
            .container {
                padding: 20px;
            }
            .header-actions {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }
            .header-actions form {
                width: 100%;
                flex-wrap: wrap;
            }
            .search-input {
                width: 100%;
            }
            .btn {
                width: 100%;
                text-align: center;
                margin-top: 5px;
            }
            table {
                font-size: 14px;
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 22px;
                margin-bottom: 20px;
            }
            .container {
                padding: 15px;
            }
            table {
                display: block;
                width: 100%;
                overflow-x: auto;
                white-space: nowrap;
            }
            th, td {
                padding: 10px;
                font-size: 13px;
            }
            .header-actions {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }
            .header-actions form {
                display: flex;
                flex-direction: column;
                gap: 8px;
            }
            .search-input {
                width: 100%;
                font-size: 13px;
            }
            .btn {
                width: 100%;
                font-size: 13px;
            }
            .btn-info, .btn-danger {
                font-size: 12px;
                padding: 6px 10px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            .container {
                padding: 10px;
                border-radius: 5px;
            }
            h1 {
                font-size: 20px;
            }
            .search-input {
                font-size: 12px;
                padding: 8px;
            }
            .btn {
                font-size: 12px;
                padding: 8px 12px;
            }
            th, td {
                font-size: 12px;
                padding: 8px;
            }
            .no-data {
                padding: 20px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>পুলিশ ভেরিফিকেশন রেকর্ড</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="header-actions" style="display:flex; align-items:center; justify-content:space-between; gap:16px;">
            <form action="{{ route('users-data.index') }}" method="GET" style="display:flex; align-items:center; gap:8px;">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="নাম, আইডি, মোবাইল, জাতীয়তা সার্চ করুন..." class="search-input" autofocus>
                <button type="submit" class="btn btn-primary"> সার্চ </button>
                <a href="{{ route('users-data.index') }}" class="btn btn-info p-5" style="{{ (isset($search) && $search) ? '' : 'visibility:hidden;' }}"> ক্লিয়ার </a>
            </form>

            <div style="flex:0 0 auto;">
                <a href="{{ route('users.create') }}" class="btn btn-success">+ নতুন প্রার্থী যোগ করুন</a>
            </div>
        </div>

        @if($users->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ক্রমিক</th>
                        <th>প্রার্থী আইডি</th>
                        <th>পূর্ণ নাম</th>
                        <th>মোবাইল নম্বর</th>
                        <th>জাতীয়তা</th>
                        <th>জন্ম তারিখ</th>
                        <th>বিস্তারিত</th>
                        <th>ইডিট</th>
                        <th>ডিলিট</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                            <td>{{ $user->employee_id }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->mobile_number }}</td>
                            <td>{{ $user->nationality }}</td>
                            <td>{{ $user->birth_date->format('d M, Y') }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" target="_blank" class="btn btn-info">দেখুন</a>
                            </td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">ইডিট </a>
                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('আপনি কি নিশ্চিত যে এই রেকর্ডটি ডিলিট করতে চান?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">ডিলিট</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $users->links() }}
            </div>
        @else
            <div class="no-data">
                <p>কোন যাচাইকরণ রেকর্ড পাওয়া যায়নি।</p>
                <p><a href="{{ route('users.create') }}" class="btn btn-primary">প্রথম রেকর্ড তৈরি করুন</a></p>
            </div>
        @endif
    </div>
</body>
</html>
