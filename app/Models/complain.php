<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complain extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','apartment_id'];
    public function apartment(){
    	return $this->belongsTo('App\Models\Apartment');
    }
    public function user(){
    	return $this->belongsTo('App\Models\user');
    }
}
