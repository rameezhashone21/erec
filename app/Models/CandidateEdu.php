<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateEdu extends Model
{
    use HasFactory;

    protected $table = 'candidates_edu';

    protected $fillable = [
        'user_id',
        'education',
        'course',
        'institute',
        'institute_loc',
        'passing_year',
        'description',
        'grade',
    ];
}
