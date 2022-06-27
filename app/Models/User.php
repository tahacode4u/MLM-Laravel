<?php

namespace App\Models;

use App\Models\Commissions;
use App\Models\MarketingLevel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'referral_code',
        'mlm_level',
        'user_level',
        'balance'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * User has one marketing level relationship
     */
    public function marketingLevel()
    {
        return $this->hasOne(MarketingLevel::class);
    }

    /**
     * User has many commissions relations
     */
    public function commissions()
    {
        return $this->hasMany(Commissions::class);
    }

    /**
     * Get Descendents list of users according mlm_level field
     */
    public function getChildUsers()
    {
        return $this->hasMany(User::class, 'mlm_level')->with('getChildUsers');
    }
}
