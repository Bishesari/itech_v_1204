<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    public $timestamps = false;
    public function field():BelongsTo
    {
        return $this->belongsTo(Field::class);
    }
}
