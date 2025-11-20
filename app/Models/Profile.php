<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'domicile', 'status', 'about', 'email', 'whatsapp', 'instagram', 'github', 'photo'
    ];
}