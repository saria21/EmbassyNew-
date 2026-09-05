<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class visa_applicants extends Model
{
    protected $table = 'visa_applicants';
    protected $primaryKey = 'applicant_id';
    protected $fillable = ['passport_number', 'first_name', 'last_name', 'nationality'];

    // 🟢 RELATIONSHIPS: A traveler has many applications and interview dates
    public function appointments(): HasMany
    {
        return $this->hasMany(appointments::class, 'applicant_id', 'applicant_id');
    }

    public function visaApplications(): HasMany
    {
        return $this->hasMany(visa_applications::class, 'applicant_id', 'applicant_id');
    }
}
