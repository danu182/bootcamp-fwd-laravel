<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\ManagementAccess\DetailUser;
use App\Models\ManagementAccess\Role;
use App\Models\ManagementAccess\RoleUser;
use App\Models\Operational\Appointment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use SoftDeletes;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



 // many to many --- //
    public function role()
    {
        return $this->belongsToMany('App\Models\ManagementAccess\Role');
    }

    // one to many
    public function appointment()
    {
        // 2 parameter (path model, field foreign key)
        return $this->hasMany(Appointment::class, 'user_id');
    }

    public function detail_user()
    {
        // 2 parameter (path model, field foreign key)
        return $this->hasOne(DetailUser::class, 'user_id');
    }

    public function role_user()
    {
        // 2 parameter (path model, field foreign key)
        return $this->hasMany(RoleUser::class, 'user_id');
    }



}
