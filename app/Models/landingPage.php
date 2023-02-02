<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class landingPage extends Model
{
    use HasFactory;
    protected $fillable = ['nama_banner', 'judul'];
    protected $table = 'landing_page';
    public $timestamps = false;
}
