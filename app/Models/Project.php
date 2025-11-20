<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['name', 'description', 'features', 'tech_stack', 'github_link', 'image'];
}
