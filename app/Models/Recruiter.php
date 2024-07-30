<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CompanyCategory;
use App\Models\RecruiterFeatures;

class Recruiter extends Model
{
    use HasFactory;

    protected $table = 'recruiter';

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'postal_code',
        'country_code',
        'city',
        'country',
        'phone',
        'abn',
        'acn',
        'terms',
        'description',
        'avatar',
        'tagline',
        'address',
        'lastName',
        'lat',
        'lng',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function recRelation()
    {
        return $this->hasMany(CompanyRecRelation::class, 'rec_id', 'id');
    }
    public function CompRecRelation($id, $rec)
    {
        $comp = CompanyRecRelation::where('com_id', $id)->where('rec_id', $rec)->first();
        return $comp;
    }
    public function features()
    {
        return $this->belongsToMany(
            CompanyCategory::class,
            RecruiterFeatures::class,
            'rec_id',
            'cat_id',
        );
    }
    public function openPosts()
    {
        return $this->hasMany(Posts::class, 'rec_id', 'id');
    }
}
