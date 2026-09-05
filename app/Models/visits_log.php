<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class visits_log extends Model
{
    protected $table = 'visits_log';
    protected $primaryKey = 'visit_id';
    protected $fillable = ['visitor_id', 'staff_id', 'check_in_time', 'check_out_time'];

    // 🟢 RELATIONSHIP: Look up which employee logged this building guest
    public function staff(): BelongsTo
    {
        return $this->belongsTo(User::class, 'staff_id', 'staff_id');
    }
}
