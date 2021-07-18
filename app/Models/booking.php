<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $fillable = ['date','time','is_active','user_id','apartment_id'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function  apartment()
     {
         return $this->belongsTo(apartment::class);
     }
     public function scopeActive($query)
     {
         return $query->where('is_active',true);
 
     }
 
     public function scopeInactive($query)
     {
         return $query->where('is_active',false);
 
     }
}
