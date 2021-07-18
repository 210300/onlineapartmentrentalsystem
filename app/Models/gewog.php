<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gewog extends Model
{
    protected $fillable = [
        
        'name',
    ];
    public function apartment(){
    	return $this->belongsTo(apartment::class);
    }
}
