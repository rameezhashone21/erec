<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvPersonalInfo extends Model
{
    use HasFactory;
    protected $table = "cv_personal_info";
    protected $fillable =
    [
        'cv_builder_id',
        'name',
        'father_name',
        'email',
        'phone',
        'cv_profile',
        'age',
        'dob',
        'title',
        'location',
        'marital_status',
        'visa_status',
        'nationality',
        'about',
        'summary'
    ];
}
