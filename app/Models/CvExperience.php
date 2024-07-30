<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvExperience extends Model
{
    use HasFactory;
    protected $table = "cv_experience";
    protected $fillable =
    [
        'cv_builder_id',
        'title',
        'company',
        'dates',
        'city',
        'description',
    ];
}
