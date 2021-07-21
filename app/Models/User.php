<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Profile;
use App\Models\Phone;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // protecte $guarded...

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

    // relación: uno a uno
    public function profile()
    {
       // return Profile::where('user_id', $this->id)->first();
       // return $this->hasOne(Profile::class); // Así se debe importar con use ...
       // return $this->hasOne('App\Models\Profile', 'foreign_key', 'primary_key');  // cuando no tiene los nombres de las convenciones
       
       return $this->hasOne(Profile::class); 
       # return $this->hasOne('App\Models\Profile');       
    }

    public function phone()
    {
    return $this->hasOne(Phone::class);
    // OR return $this->hasOne('App\Phone');
    }    


}
