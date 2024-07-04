<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class headquarter extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'address',
        'logo',
        'status',
    ];
}
