<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $table ="site_setting";
    protected $fillable = [
        "name",
        "logo",
        "tax_rate",
        "site_url"
    ];
}
