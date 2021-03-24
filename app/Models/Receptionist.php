<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class Receptionist extends Authenticatable
{
    use LaratrustUserTrait, HasFactory, Notifiable;

    protected $guard = [];
    protected $fillable = ['name', 'email', 'password', 'created_by', 'image', 'phone', 'national_id','panned'];

public function admin()
{
    return $this->belongsTo(Admin::class, 'panned', 'id');
}

public function getRouteKeyName()
{
    return 'name';
}

/**
 * The attributes that should be hidden for arrays.
 *
 * @var array
 */
protected $hidden = [
    'password',
    'remember_token',
];

/**
 * The attributes that should be cast to native types.
 *
 * @var array
 */
protected $casts = [
    'email_verified_at' => 'datetime',
];

public function getImagePathAttribute()
{
    return asset('uploads/images/receptionists/' . $this->image);
} // To Return The Image Path
}
