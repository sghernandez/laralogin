<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Phone extends Model
{
    use HasFactory;
  
    public $timestamps = false;
  
    protected $fillable = [
        'user_id',
        'phone'
    ];

    
/**
 * Get the user that owns the phone.
 */
public function user()
{
    return $this->belongsTo(User::class);
    // OR return $this->belongsTo('App\User');
}

    
}