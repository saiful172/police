<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GovtRelative extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'relative_name',
        'designation',
        'working_place',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
