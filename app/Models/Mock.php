<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mock extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "function",
        "arguments"
    ];

    function arguments() {
        return $this->hasMany(Argument::class);
    }
}

