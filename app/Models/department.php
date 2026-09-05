<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class department extends Model
{
    protected $table = 'departments';
    protected $primaryKey = 'department_id';
    protected $fillable = ['name', 'building_id'];

    // 🟢 RELATIONSHIPS: Tying departments to parent buildings and staff users
    public function building(): BelongsTo
    {
        return $this->belongsTo(related_buildings::class, 'building_id', 'id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'department_id', 'department_id');
    }
}
