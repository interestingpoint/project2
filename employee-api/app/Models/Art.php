<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
        protected $fillable = [
        'name', 'size', 'artist'
    ];
}
