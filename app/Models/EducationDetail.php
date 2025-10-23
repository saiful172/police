<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EducationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'institution_name',
        'degree_name',
        'reg_no',
        'roll_no',
        'admission_date',
        'admission_session',
        'completion_year',
    ];

    protected $casts = [
        'admission_date' => 'date',
        'completion_year' => 'date',
    ];

    /**
     * Get the user that owns the education detail.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
