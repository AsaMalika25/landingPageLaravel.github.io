<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ekstra extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'deskripsi'];
    protected $table = 'ekstrakulikuler';
    protected $timestamp = false;
}
