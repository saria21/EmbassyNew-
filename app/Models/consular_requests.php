<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class consular_requests extends Model
{
    protected $table = 'consular_requests';
    protected $primaryKey = 'request_id';
    protected $fillable = ['citizen_id', 'request_type', 'request_status'];

    // 🟢 RELATIONSHIP: Look up the local citizen who opened this service case
    public function citizen(): BelongsTo
    {
        return $this->belongsTo(citizen::class, 'citizen_id', 'citizen_id');
    }
}
