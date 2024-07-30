<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvEducation extends Model
{
    use HasFactory;
    protected $table = "cv_education";
    protected $fillable =
    [
        'cv_builder_id',
        'degree',
        'institute',
        'date',
        'city',
        'description',
        'status'
    ];
}
