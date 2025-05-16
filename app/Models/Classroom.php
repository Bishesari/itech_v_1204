<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classroom extends Model
{
    public $timestamps = false;

    public function institute(): BelongsTo
    {
        return $this->belongsTo(Institute::class);
    }

}
