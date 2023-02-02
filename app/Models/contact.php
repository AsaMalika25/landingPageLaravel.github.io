<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'email', 'subject', 'message'];
    protected $table = 'contact';
    protected $timestamp = true;
}
