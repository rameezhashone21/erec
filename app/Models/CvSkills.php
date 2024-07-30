<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvSkills extends Model
{
    use HasFactory;
    protected $table = "cv_skills";
    protected $fillable =
    [
        'cv_builder_id',
        'skill'
    ];
}
