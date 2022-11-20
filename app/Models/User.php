<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Union;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar',
        'name',
        'email',
        'password',
        'mobile',
        'dob',
        'gender',
        'is_admin',
        'occupation',
        'address',
        'relation_status',
        'blood',
        'website',
        'facebook',
        'youtube',
        'twitter',
        'division_id',
        'district_id',
        'upazila_id',
        'union_id',
    ];

    public function division()
    {
        return $this->hasOne(Division::class, 'division_id');
    }

    public function getDistrict()
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }

    public function getUpazila()
    {
        return $this->hasOne(Upazila::class, 'id', 'upazila_id');
    }
    public function getUnion()
    {
        return $this->hasOne(Union::class, 'id', 'union_id');
    }
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
}
