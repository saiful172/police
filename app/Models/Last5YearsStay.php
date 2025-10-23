<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Last5YearsStay extends Model
{
    use HasFactory;

    protected $table = 'last_5years_stays';

    protected $fillable = [
        'user_id',
        'address_details',
        'from_date',
        'to_date',
    ];

    protected $casts = [
        'from_date' => 'date',
        'to_date' => 'date',
    ];

    /**
     * Get the user that owns the stay detail.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
