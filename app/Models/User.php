<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    public $timestamps = false;
    use HasFactory, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function initials(): string
    {
        return Str::of($this->profile->f_name_fa . '، ' . $this->profile->l_name_fa)
            ->explode('، ')
            ->map(fn(string $name) => Str::of($name)->substr(0, 1))
            ->implode(' ');
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function mobiles(): BelongsToMany
    {
        return $this->belongsToMany(Mobile::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'institute_role_user')->withPivot('institute_id');
    }
    public function institutes(): BelongsToMany
    {
        return $this->belongsToMany(Institute::class, 'institute_role_user')->withPivot('role_id');
    }

}
