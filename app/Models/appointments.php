<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class appointments extends Model
{
    protected $table = 'appointments';
    protected $primaryKey = 'appointment_id';
    protected $fillable = ['applicant_id', 'citizen_id', 'interviewer_staff_id', 'appointment_date', 'purpose_of_visit', 'status'];

    // 🟢 RELATIONSHIPS: Look up the exact profiles linked to any interview slot
    public function interviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'interviewer_staff_id', 'staff_id');
    }

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(visa_applicants::class, 'applicant_id', 'applicant_id');
    }

    public function citizen(): BelongsTo
    {
        return $this->belongsTo(citizen::class, 'citizen_id', 'citizen_id');
    }
}
