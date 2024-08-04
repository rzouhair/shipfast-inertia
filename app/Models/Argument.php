<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Argument extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "type",
        "default",
        "is_nullable",
        "mock_id"
    ];

    function mock() {
        return $this->hasOne(Argument::class);
    }
}
