<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
        ];
    }
        public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function userDetail()
    {
        return $this->hashMany(UserDetail::class, 'user_id');
    }

    public function canAccessPanel(Panel $panel): bool

    {
        //if role_id in user === 1 can access admin panel
        if ($this->role_id === 3) {
            return false;
        }
        return true;
    }
    // public function canAccessPanel(Panel $panel): bool
    // {


        // if($panel->getId()=='admin'){
        //     if($this->role_id===3){
        //         return false;
        //     }
        //     return true;
        // }


}
