<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Institute extends Model
{
    public $timestamps = false;
    protected $fillable = ['short_name','full_name', 'abb', 'created'];

    public function classrooms(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }

    public function users(): BelongsToMany{
        return $this->belongsToMany(User::class)->withPivot('role_id');
    }
}
