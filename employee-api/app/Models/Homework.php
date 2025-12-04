<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
        protected $fillable = [
        'name', 'questions', 'class'
    ];
}
