<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Field extends Model
{
    public $timestamps = false;

    public function skills():HasMany
    {
        return $this->hasMany(Skill::class);
    }

}
