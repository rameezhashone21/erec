<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateProfessionalExp extends Model
{
    use HasFactory;

    protected $table = 'candidates_professional_exp';

    protected $fillable = [
        'user_id',
        'month_exp', //start date
        'year_exp', //end date
        'designation',
        'company_name',
        'comp_loc',
        'currency',
        'salary',
        'description',
        'delete',
        'date_diff',
    ];
}
