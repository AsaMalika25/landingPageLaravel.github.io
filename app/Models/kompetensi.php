<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kompetensi extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'deskripsi'];
    protected $table = 'kompetensi';
    protected $timestamp = 'false';
}
