<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dzongkhag extends Model
{
    protected $fillable = [
        
        'name',
    ];
    protected $table = 'dzongkhags';
    public function apartment(){
    	return $this->belongsTo(apartment::class);
    }
}
