<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {

    use SoftDeletes;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;

    use TwoFactorAuthenticatable;

    public const ACTIVE = 'Active';
    public const INACTIVE = 'Inactive';
    public const ARCHIVED = 'Archived';
    public const CEYTECH = 'Ceytech';
    public const USERWEB = 'User Web';
    public const USERMOBILE = 'User Mobile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'name',
        'email',
        'password',
        'contactNo',
        'nic',
        'firstName',
        'lastName',
        'address',
        'roll'
    ];
//    protected $rules = [
//        'email' => 'sometimes|required|email|unique:users',
//    ];

    /**
     * The attributes that should be hidden for arrays.
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
     * The attributes that should be cast to native types.
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

    public function roll() {
        return $this->belongsTo(Roll::class);
    }

    public function privileges() {
        return $this->belongsToMany(Privilege::class)->withPivot('is_read', 'is_create', 'is_update', 'is_delete');
    }

    public function authentication($id) {
        $pre = $this->privileges;
        foreach ($pre as $p) {
            if ($p['id'] == $id) {
                return $p['pivot'];
            }
        }
        return null;
    }

    public function Customer(){
        return $this->belongsTo(Customer::class);
    }
}
