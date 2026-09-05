<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class citizen extends Model
{
    protected $table = 'citizens';
    protected $primaryKey = 'citizen_id';
    protected $fillable =
     ['passport_number',
      'first_name', '
      last_name', 
      'current_address'];

    // 🟢 RELATIONSHIPS: A local citizen has many requests and appointments
    public function appointments(): HasMany
    {
        return $this->hasMany(appointments::class, 'citizen_id', 'citizen_id');
    }

    public function consularRequests(): HasMany
    {
        return $this->hasMany(consular_requests::class, 'citizen_id', 'citizen_id');
    }
}
