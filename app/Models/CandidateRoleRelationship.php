<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Recruiter;

class CandidateRoleRelationship extends Model
{
    use HasFactory;

    protected $table = 'pivot_candidate_role';

    protected $fillable = [
        'candidate_id',
        'user_id',
        'role',
        'status',
    ];

    public function candCompRel()
    {
        return $this->belongsTo(Company::class, 'candidate_id', 'user_id');
    }
    public function candRecRel()
    {
        return $this->belongsTo(Recruiter::class, 'candidate_id', 'user_id');
    }
}
