<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Recruiter;
use App\Models\Company;
use App\Models\CandidateDocs;
use App\Models\CandidateSkills;
use App\Models\Skills;
use App\Models\Candidate;
use App\Models\CandidateEdu;
use App\Models\CandidateProfessionalExp;
use App\Models\Wishlist;
use App\Models\SubscriptionPackages;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'user';

    protected $fillable = [
        'email',
        'new_user_id',
        'package_id',
        'package_buy_paypal_token',
        'package_buy_stripe_token',
        'stripe_id',
        'stripe_user_id',
        'new_user_type',
        'package_status',
        'name',
        'lname',
        'avatar',
        'banner',
        'password',
        'role',
        'package_expiry',
        'total_no_of_posts',
        'all_posts_count',
        'posts_count',
        'status',       /** status = 0(Inactive) / 1(Active) / 5(Admin Inactive)    */
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'id', 'user_id');
    }
    public function candidateEdu()
    {
        return $this->hasMany(CandidateEdu::class, 'user_id', 'id')
            ->where('delete', 0)
            ->orderBy('passing_year', 'DESC');
    }
    public function candidatePro()
    {
        // return $this->hasMany(CandidateProfessionalExp::class, 'user_id', 'id')->where('delete', 0)->orderBy('year_exp', 'DESC');
        return $this->hasMany(CandidateProfessionalExp::class, 'user_id', 'id')
            ->where('delete', 0)
            ->orderBy('year_exp');
    }
    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class, 'id', 'user_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'id', 'user_id');
    }
    public function resume()
    {
        return $this->hasMany(CandidateDocs::class, 'user_id', 'id')
            ->orderBy('id', 'DESC');
    }
    public function skills()
    {
        return $this->belongsToMany(
            Skills::class,
            CandidateSkills::class,
            'user_id',
            'skill_id',
        );
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function secondUsers()
    {
        return $this->belongsToMany(
            User::class,
            Message::class,
            'user_id',
            'second_user',
        );
    }
    public function secondUsers_two()
    {
        return $this->belongsToMany(
            User::class,
            Message::class,
            'second_user',
            'user_id',
        );
    }
    public function wishlist($post_id)
    {
        // return $this->hasMany(Wishlist::class, 'candidate_id' ,'id')->where('post_id', $post_id)->first();
        return $this->hasMany(Wishlist::class, 'candidate_id', 'id')
            ->orderBy('id', 'DESC')
            ->where('post_id', $post_id)
            ->first();
    }
    public function wishlistCount()
    {
        return $this->hasMany(Wishlist::class, 'candidate_id', 'id')
            ->orderBy('id', 'DESC');
    }
    public function package()
    {
        return $this->belongsTo(SubscriptionPackages::class, 'package_id', 'id');
    }
}
