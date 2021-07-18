<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Auth\Authenticatable; 
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class owner extends Model 
{
    use Authenticatable, CanResetPassword;

    use HasFactory;
  
    protected $table = 'owners';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'gender',
        'dzongkhag',
        'gewog',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getAuthPassword()
    {
     return $this->owner_password;
    }
    
}
