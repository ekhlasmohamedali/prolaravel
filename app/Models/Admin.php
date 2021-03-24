<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class Admin extends Authenticatable
{
    use LaratrustUserTrait, HasFactory, Notifiable;

    protected $guard = [];
    protected $fillable = ['name', 'email', 'password', 'created_by', 'image', 'phone', 'national_id'];

    protected $hidden = [ 'password'];

    public function admins()
    {
        return $this->hasMany(Admin::class, 'created_by', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }

    public function getImagePathAttribute()
    {
        return asset('uploads/images/admins/' . $this->image);
    } // To Return The Image Path
}
