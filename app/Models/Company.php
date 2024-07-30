<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompanyCategory;
use App\Models\CompanyFeatures;
use App\Models\User;
use App\Models\CompanyRecRelation;
use App\Models\SendRequest;
use App\Models\Recruiter;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    protected $fillable = [
        'name',
        'user_id',
        'slug',
        'country_code',
        'phone',
        'abn',
        'acn',
        'whatWeDo',
        'mission',
        'website',
        'industry',
        'cSizeFrom',
        'cSizeTo',
        'logo',
        'description',
        'type',
        'founded',
        'specialties',
        'linkedIn',
        'twitter',
        'facebook',
        'headQuarter',
        'terms',
        'tagline',
        'insta',
        'address',
        'lat',
        'lng',
        'postal_code',
        'city',
        'country',
    ];

    public function features()
    {
        return $this->belongsToMany(
            CompanyCategory::class,
            CompanyFeatures::class,
            'com_id',
            'comp_cat_id',
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function recRelation()
    {
        return $this->belongsToMany(
            Recruiter::class,
            CompanyRecRelation::class,
            'com_id',
            'rec_id',
        )->where('status', 1);
    }
    public function rec()
    {
        return $this->hasMany(CompanyRecRelation::class, 'com_id', 'id');
    }
    public function recRequest()
    {
        return $this->hasMany(SendRequest::class, 'com_id', 'id');
    }
    public function openPosts()
    {
        return $this->hasMany(Posts::class, 'comp_id', 'id');
    }
    public function posts()
    {
        return $this->hasMany(Posts::class, 'comp_id', 'id');
    }
}
