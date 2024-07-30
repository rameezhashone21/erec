<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $table = 'candidates_details';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'slug',
        'gender',
        'nationality',
        'address',
        'address_status',
        'email',
        'email_status',
        'country_code',
        'number',
        'phone_status',
        'terms',
        'head_line',
        'dob',
        'religion',
        'marital_status',
        'driving_license',
        'languages',
        'visa_status',
        'visa_status_status',
        'status',
        'tagline',
        'zipCode',
        'latitude',
        'longitude',
        'keyword',
        'facbookLink',
        'twitterLink',  //youtube
        'instagramLink',
        'linkdinLink',
        'country',
        'city',
        // 'postal_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function jobApplications()
    {
        return $this->hasMany(JobApplications::class, 'candidate_id', 'id');
    }
    public function postComp()
    {
        return $this->belongsTo(JobApplications::class,'candidate_id','id')->where('comp_id', auth()->user()->company->id);
    }
}
