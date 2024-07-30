<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class CompanyFeatures extends Model
{
    use HasFactory;

    protected $table = 'comp_features';

    protected $fillable = [
        'com_id',
        'comp_cat_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'com_id', 'id');
    }
}
