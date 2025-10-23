<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birth_date' => 'date',
            'is_freedom_fighter_related' => 'boolean',
            'has_disability' => 'boolean',
            'has_police_case' => 'boolean',
            'has_govt_relative' => 'boolean',
            'is_married' => 'boolean',
            'has_worked_with_army' => 'boolean',
            'army_file_paths' => 'array',
        ];
    }

    /**
     * Get the education details for the user.
     */
    public function educationDetails(): HasMany
    {
        return $this->hasMany(EducationDetail::class);
    }

    /**
     * Get the last 5 years stay records for the user.
     */
    public function last5YearsStays(): HasMany
    {
        return $this->hasMany(Last5YearsStay::class);
    }

    /**
     * Previous job experiences of the user.
     */
    public function previousJobExperiences(): HasMany
    {
        return $this->hasMany(PreviousJobExperience::class);
    }

    /**
     * Govt relatives info of the user.
     */
    public function govtRelatives(): HasMany
    {
        return $this->hasMany(GovtRelative::class);
    }

    /**
     * Two witnesses references.
     */
    public function witnesses(): HasMany
    {
        return $this->hasMany(Witness::class);
    }
}
