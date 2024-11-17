<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belajar extends Model
{
    use HasFactory;

    protected $table = 'belajar';

    protected $fillable = [
        'tamu', // Kolom tamu
        'audience', // Kolom audience
        'hari',
        'jam',
        'status',
    ];
}
