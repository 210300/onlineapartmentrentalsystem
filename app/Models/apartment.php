<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\booking;

class apartment extends Model
{
    use HasFactory;
    protected $table = 'apartments';
    public function dzongkhag(){
        return $this->belongsTo(Dzongkhag::class);
    }
      public function gewog(){
        return $this->belongsTo(Gewog::class);
    }
    public function user($id){
        return $this->belongsTo(User::class);
    }
    public function bookings()
    {
        return $this->hasMany(booking::class);
    }
    public function complain(){
        return $this->hasMany('App\Models\complain');
    }
}
