<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class visa_applications extends Model
{
    protected $table = 'visa_applications';
    protected $primaryKey = 'application_id';
    protected $fillable = ['applicant_id', 'visa_type', 'application_status'];

    // 🟢 RELATIONSHIP: Look up the traveler attached to this application log
    public function applicant(): BelongsTo
    {
        return $this->belongsTo(visa_applicants::class, 'applicant_id', 'applicant_id');
    }
}
