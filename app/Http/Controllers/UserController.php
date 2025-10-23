<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserVerificationService;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Download all attached files and filled form as PDF in a ZIP.
     */
    public function download(User $user)
    {
        // Ensure only admin can download
        // No authentication check, allow all users

        $user->load(['educationDetails', 'last5YearsStays', 'previousJobExperiences', 'govtRelatives', 'witnesses']);

    $downloadService = app(\App\Services\UserDownloadService::class);
    $pdfPath = $downloadService->generateUserPdf($user);
    return response()->download($pdfPath, $user->employee_id . '-' . Str::slug($user->full_name) . '.pdf')->deleteFileAfterSend(true);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $search = request('search');

        $users = User::with(['educationDetails', 'last5YearsStays', 'previousJobExperiences', 'govtRelatives', 'witnesses'])
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('employee_id', 'like', "%{$search}%")
                      ->orWhere('full_name', 'like', "%{$search}%")
                      ->orWhere('mobile_number', 'like', "%{$search}%")
                      ->orWhere('nationality', 'like', "%{$search}%")
                      ->orWhere('fathers_name_design_nation', 'like', "%{$search}%")
                      ->orWhere('permanent_address_details', 'like', "%{$search}%")
                      ->orWhere('present_address_details', 'like', "%{$search}%")
                      ->orWhere('birth_place', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('users.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('form.create-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request, UserVerificationService $service): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();

            $user = User::create([
                'employee_id' => $data['employee_id'],
                'mobile_number' => $data['mobile_number'],
                'full_name' => $data['full_name'],
                'designation' => $data['designation'],
                'nationality' => $data['nationality'],
                'fathers_name_design_nation' => $data['fathers_name_design_nation'],
                'permanent_address_details' => $data['permanent_address_details'],
                'present_address_details' => $data['present_address_details'],
                'birth_date' => $data['birth_date'],
                'birth_place' => $data['birth_place'],
                'is_freedom_fighter_related' => (bool) ($data['is_freedom_fighter_related'] ?? false),
                'has_disability' => (bool) ($data['has_disability'] ?? false),
                'has_police_case' => (bool) ($data['has_police_case'] ?? false),
                'has_govt_relative' => (bool) ($data['has_govt_relative'] ?? false),
                'is_married' => (bool) ($data['is_married'] ?? false),
                'has_worked_with_army' => (bool) ($data['has_worked_with_army'] ?? false),
                'partner_nationality' => $data['partner_nationality'] ?? null,
            ]);

            // Education details
            $educationInput = $data['education'] ?? [];
            if (!empty($educationInput)) {
                $user->educationDetails()->createMany(
                    collect($educationInput)->map(fn ($e) => [
                        'institution_name' => $e['institution_name'],
                        'degree_name' => $e['degree_name'],
                        'reg_no' => $e['reg_no'],
                        'roll_no' => $e['roll_no'],
                        'admission_date' => $e['admission_date'],
                        'admission_session' => $e['admission_session'],
                        'completion_year' => $e['completion_year'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ])->toArray()
                );
            }

            // Stays
            $staysInput = $data['stays'] ?? [];
            if (!empty($staysInput)) {
                $user->last5YearsStays()->createMany(
                    collect($staysInput)->map(fn ($s) => [
                        'address_details' => $s['address_details'],
                        'from_date' => $s['from_date'],
                        'to_date' => $s['to_date'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ])->toArray()
                );
            }

            // Previous jobs, Govt relatives, Witnesses
            $service->syncPreviousJobs($user, $data['previous_jobs'] ?? []);
            $service->syncWitnesses($user, $data['witnesses'] ?? []);
            if (!empty($data['has_govt_relative']) && !empty($data['govt_relatives'] ?? [])) {
                $service->syncGovtRelatives($user, $data['govt_relatives']);
            }

            // Debug file upload
            $files = [
                'freedom_fighter_doc' => request()->file('freedom_fighter_doc'),
                'disability_doc' => request()->file('disability_doc'),
                'testimonial_file' => request()->file('testimonial_file'),
                'signature_file' => request()->file('signature_file'),
            ];
            foreach ($files as $key => $file) {
                Log::info("File debug: $key", [
                    'is_uploaded' => $file ? true : false,
                    'original_name' => $file ? $file->getClientOriginalName() : null,
                    'size' => $file ? $file->getSize() : null,
                ]);
            }

            // Files
            $user->freedom_fighter_doc_path = $service->storeFile(request()->file('freedom_fighter_doc'), 'freedom_fighter_docs');
            $user->disability_doc_path = $service->storeFile(request()->file('disability_doc'), 'disability_docs');
            $user->testimonial_file_path = $service->storeFile(request()->file('testimonial_file'), 'testimonial_files');
            $user->signature_file_path = $service->storeFile(request()->file('signature_file'), 'signatures');
            $user->police_case_details = $data['police_case_details'] ?? null;
            
            // Army files (multiple)
            $armyFilePaths = [];
            if (!empty($data['has_worked_with_army']) && request()->hasFile('army_files')) {
                foreach (request()->file('army_files') as $armyFile) {
                    if ($armyFile) {
                        $path = $service->storeFile($armyFile, 'army_docs');
                        if ($path) {
                            $armyFilePaths[] = $path;
                        }
                    }
                }
            }
            $user->army_file_paths = $armyFilePaths;
            
            $user->save();

            DB::commit();

            return redirect()->route('users.show', $user->id)
                ->with('success', 'Police verification form submitted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to store user verification: ' . $e->getMessage());

            return redirect()->back()->withInput()
                ->with('error', 'Failed to submit the form. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        $user->load(['educationDetails', 'last5YearsStays', 'previousJobExperiences', 'govtRelatives', 'witnesses']);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $user->load(['educationDetails', 'last5YearsStays', 'previousJobExperiences', 'govtRelatives', 'witnesses']);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user, UserVerificationService $service): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();

            $user->update([
                'employee_id' => $data['employee_id'],
                'mobile_number' => $data['mobile_number'],
                'full_name' => $data['full_name'],
                'designation' => $data['designation'] ?? $user->designation,
                'nationality' => $data['nationality'],
                'fathers_name_design_nation' => $data['fathers_name_design_nation'],
                'permanent_address_details' => $data['permanent_address_details'],
                'present_address_details' => $data['present_address_details'],
                'birth_date' => $data['birth_date'],
                'birth_place' => $data['birth_place'],
                'is_freedom_fighter_related' => (bool) ($data['is_freedom_fighter_related'] ?? false),
                'has_disability' => (bool) ($data['has_disability'] ?? false),
                'has_police_case' => (bool) ($data['has_police_case'] ?? false),
                'has_govt_relative' => (bool) ($data['has_govt_relative'] ?? false),
                'is_married' => (bool) ($data['is_married'] ?? false),
                'has_worked_with_army' => (bool) ($data['has_worked_with_army'] ?? false),
                'partner_nationality' => $data['partner_nationality'] ?? null,
            ]);

            // Replace education details
            $user->educationDetails()->delete();
            $educationInput = $data['education'] ?? [];
            if (!empty($educationInput)) {
                $user->educationDetails()->createMany(
                    collect($educationInput)->map(fn ($e) => [
                        'institution_name' => $e['institution_name'],
                        'degree_name' => $e['degree_name'],
                        'reg_no' => $e['reg_no'],
                        'roll_no' => $e['roll_no'],
                        'admission_date' => $e['admission_date'],
                        'admission_session' => $e['admission_session'],
                        'completion_year' => $e['completion_year'],
                    ])->toArray()
                );
            }

            // Replace stays
            $user->last5YearsStays()->delete();
            $staysInput = $data['stays'] ?? [];
            if (!empty($staysInput)) {
                $user->last5YearsStays()->createMany(
                    collect($staysInput)->map(fn ($s) => [
                        'address_details' => $s['address_details'],
                        'from_date' => $s['from_date'],
                        'to_date' => $s['to_date'],
                    ])->toArray()
                );
            }

            // Replace job experiences, relatives, witnesses
            $service->syncPreviousJobs($user, $data['previous_jobs'] ?? []);
            // If user indicates no govt relative, clear any existing ones
            if (empty($data['has_govt_relative'])) {
                $user->govtRelatives()->delete();
            } else {
                $service->syncGovtRelatives($user, $data['govt_relatives'] ?? []);
            }
            $service->syncWitnesses($user, $data['witnesses'] ?? []);

            // Replace files if provided
            if ($file = request()->file('freedom_fighter_doc')) {
                $user->freedom_fighter_doc_path = $service->storeFile($file, 'freedom_fighter_docs');
            }
            if ($file = request()->file('disability_doc')) {
                $user->disability_doc_path = $service->storeFile($file, 'disability_docs');
            }
            if ($file = request()->file('testimonial_file')) {
                $user->testimonial_file_path = $service->storeFile($file, 'testimonial_files');
            }
            if ($file = request()->file('signature_file')) {
                $user->signature_file_path = $service->storeFile($file, 'signatures');
            }
            
            // Army files (replace if provided)
            if (request()->hasFile('army_files')) {
                $armyFilePaths = [];
                foreach (request()->file('army_files') as $armyFile) {
                    if ($armyFile) {
                        $path = $service->storeFile($armyFile, 'army_docs');
                        if ($path) {
                            $armyFilePaths[] = $path;
                        }
                    }
                }
                $user->army_file_paths = $armyFilePaths;
            }
            // If toggled to 'No', clear stored army files
            if (empty($data['has_worked_with_army'])) {
                $user->army_file_paths = [];
            }
            
            $user->police_case_details = $data['police_case_details'] ?? null;
            $user->save();

            DB::commit();

            return redirect()->route('users.show', $user->id)
                ->with('success', 'User information updated successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to update user: ' . $e->getMessage());

            return redirect()->back()->withInput()
                ->with('error', 'Failed to update the user. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        try {
            $user->delete();

            return redirect()->route('users-data.index')
                ->with('success', 'User deleted successfully!');

        } catch (\Exception $e) {
            Log::error('Failed to delete user: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Failed to delete the user. Please try again.');
        }
    }
}
