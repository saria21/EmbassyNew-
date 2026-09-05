<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;

// 🟢 KEEPING THE MODERN LARAVEL 11 ATTRIBUTE SCHEMAS
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;

#[Fillable(['first_name', 'last_name', 'email', 'password', 'job_title', 'role', 'department_id'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements FilamentUser, HasName
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'staff_id';

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Handles automated secure background encryption
        ];
    }

         //ELOQUENT RELATIONSHIPS 
    
    public function department(): BelongsTo
    {
        return $this->belongsTo(department::class, 'department_id', 'department_id');
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(appointments::class, 'interviewer_staff_id', 'staff_id');
    }

    public function visitsLogs(): HasMany
    {
        return $this->hasMany(visits_log::class, 'staff_id', 'staff_id');
    }

  
    //  FILAMENT PANEL INTERFACE HOOKS )
   

    /**
     * FILAMENT SECURITY HOOK: Grants automatic dashboard entry verification.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    /**
     * FILAMENT FIX: Combines your split first and last names dynamically 
     * to resolve the old layout dashboard display crash page.
     */
    public function getFilamentName(): string
    {
        if (!empty($this->first_name) || !empty($this->last_name)) {
            return trim("{$this->first_name} {$this->last_name}");
        }

        return 'Staff Member';
    }
}

