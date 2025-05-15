<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    public $timestamps = false;
    protected $fillable = ['short_name','full_name', 'abb', 'created'];
}
