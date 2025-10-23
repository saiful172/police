<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreviousJobExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'organization_name',
        'from_date',
        'to_date',
        'currently_working',
        'reason_for_left',
    ];

    protected $casts = [
        'from_date' => 'date',
        'to_date' => 'date',
        'currently_working' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
