<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultet extends Model
{
    use HasFactory;

    protected $fillable = ['nazivFakulteta', 'grad'];

    protected $table = 'fakulteti';
}
