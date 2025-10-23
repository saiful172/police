<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use ZipArchive;
use Barryvdh\DomPDF\Facade\Pdf;

class UserDownloadService
{
    /**
     * Generate a filled PDF for the user details.
     */
    public function generateUserPdf(User $user): string
    {
        $attachments = $this->getUserFiles($user);
        $pdf = Pdf::loadView('users.pdf', compact('user', 'attachments'));
        $pdfPath = storage_path('app/tmp/user_' . $user->id . '.pdf');
        $pdf->save($pdfPath);
        return $pdfPath;
    }

    /**
     * Collect all attached file paths for the user.
     */
    public function getUserFiles(User $user): array
    {
        $files = [];
        if ($user->freedom_fighter_doc_path) $files[] = public_path($user->freedom_fighter_doc_path);
        if ($user->disability_doc_path) $files[] = public_path($user->disability_doc_path);
        if ($user->testimonial_file_path) $files[] = public_path($user->testimonial_file_path);
        if ($user->signature_file_path) $files[] = public_path($user->signature_file_path);
        if (is_array($user->army_file_paths)) {
            foreach ($user->army_file_paths as $armyFile) {
                $files[] = public_path($armyFile);
            }
        }
        return array_filter($files, fn($f) => File::exists($f));
    }

    /**
     * Create a ZIP containing the PDF and all attached files.
     */
    public function createUserZip(User $user, string $pdfPath, array $files): string
    {
        $zipName = $user->employee_id . '-' . Str::slug($user->full_name) . '.zip';
        $zipPath = storage_path('app/tmp/' . $zipName);
        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            $zip->addFile($pdfPath, 'filled_form.pdf');
            foreach ($files as $file) {
                $zip->addFile($file, basename($file));
            }
            $zip->close();
        }
        return $zipPath;
    }
}
