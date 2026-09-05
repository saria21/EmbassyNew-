<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class related_buildings extends Model
{
    protected $table = 'related_buildings';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    // 🟢 RELATIONSHIP: A building has many operating departments
    public function departments(): HasMany
    {
        return $this->hasMany(department::class, 'building_id', 'id');
    }
}
