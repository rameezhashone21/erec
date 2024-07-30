<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvOthers extends Model
{
    use HasFactory;
    protected $table = "cv_language";
    protected $fillable =
    [
        'cv_builder_id',
        'language',
    ];
}
