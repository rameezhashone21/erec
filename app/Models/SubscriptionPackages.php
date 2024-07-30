<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPackages extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = [
        'name',
        'no_of_posts',
        'applicantProfiling',
        'applicantTracking',
        'erecDashboard',
        'erecReportingEngine',
        'databaseSearch',
        'uploadCV',
        'longlistAssessment',
        'shortlistAssessment',
        'emailIntegration',
        'smsIntegration',
        'liveBasedChatting',
        'industryBasedAssessment',
        'aiEngineIntegration',
        'mlEngineIntegration',
        'predictiveAnalysisEngine',
        'ctatEngine',
        'rasvEngine',
        'tatiEngine',
        'iagmEngine',
        'rtwEngine',
        'amiEngine',
        'price',
        'class',
        'status',
        'time_interval',
        'desc',
        'slogan',
        'stripe_package_id',
        'stripe_price_id',
        'slug',
        'shortdesc',
    ];
    public function users()
    {
        return $this->hasMany(User::class,'package_id','id');
    }
}
