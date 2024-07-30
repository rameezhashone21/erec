<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvBuilder extends Model
{
    use HasFactory;
    protected $table = "cv_builder";
    protected $fillable =
    [
        'user_id',
        'objective',
        'status'
    ];
    public function contact()
    {
        return $this->belongsTo(CvPersonalInfo::class,'id','cv_builder_id');
    }
    public function experience()
    {
        return $this->hasMany(CvExperience::class,'cv_builder_id','id');
    }
    public function education()
    {
        return $this->hasMany(CvEducation::class,'cv_builder_id','id');
    }
    public function skills()
    {
        return $this->hasMany(CvSkills::class,'cv_builder_id','id');
    }
    public function others()
    {
        return $this->hasMany(CvOthers::class,'cv_builder_id','id');
    }
}
