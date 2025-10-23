<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UserVerificationService
{
    public function storeFile(?UploadedFile $file, string $dir): ?string
    {
        if (!$file) {
            return null;
        }
        
        // Ensure uploads directory exists
        $uploadPath = public_path('uploads/' . $dir);
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }
        
        // Generate unique filename
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        
        // Move file to public/uploads/{dir}/filename
        $file->move($uploadPath, $filename);
        
        // Return relative path (uploads/dir/filename)
        return 'uploads/' . $dir . '/' . $filename;
    }

    public function syncPreviousJobs(User $user, array $jobs): void
    {
        $user->previousJobExperiences()->delete();
        if (empty($jobs)) return;
        $payload = collect($jobs)->map(fn ($j) => [
            'organization_name' => $j['organization_name'] ?? '',
            'from_date' => $j['from_date'] ?? null,
            'to_date' => $j['currently_working'] ?? false ? null : ($j['to_date'] ?? null),
            'currently_working' => (bool)($j['currently_working'] ?? false),
            'reason_for_left' => $j['reason_for_left'] ?? null,
        ])->toArray();
        $user->previousJobExperiences()->createMany($payload);
    }

    public function syncGovtRelatives(User $user, array $relatives): void
    {
        $user->govtRelatives()->delete();
        if (empty($relatives)) return;
        $payload = collect($relatives)->map(fn ($r) => [
            'relative_name' => $r['relative_name'] ?? '',
            'designation' => $r['designation'] ?? '',
            'working_place' => $r['working_place'] ?? '',
        ])->toArray();
        $user->govtRelatives()->createMany($payload);
    }

    public function syncWitnesses(User $user, array $witnesses): void
    {
        $user->witnesses()->delete();
        if (empty($witnesses)) return;
        $payload = collect($witnesses)->map(fn ($w) => [
            'name' => $w['name'] ?? '',
            'address' => $w['address'] ?? '',
        ])->toArray();
        $user->witnesses()->createMany($payload);
    }
}
