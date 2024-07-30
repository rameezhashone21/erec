<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recruiter;
use App\Models\Company;

class CompanyRecRelation extends Model
{
    use HasFactory;
    protected $table = 'pivot_rec_comp';

    protected $fillable = [
        'com_id',
        'rec_id',
        'sender',
        'status',
    ];
    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class, 'rec_id', 'id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'com_id','id');
    }
}
