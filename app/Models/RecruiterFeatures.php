<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompanyCategory;

class RecruiterFeatures extends Model
{
    use HasFactory;

    protected $table = 'rec_features';

    protected $fillable = [
        'rec_id',
        'cat_id',
    ];

    public function category()
    {
        return $this->belongsTo(CompanyCategory::class, 'cat_id', 'id');
    }
}
