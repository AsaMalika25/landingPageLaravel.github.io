<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logo extends Model
{
    use HasFactory;
    protected $fillable = ['logo_banner', 'judul'];
    protected $table = 'logo';
    public $timestamps = false;
}
