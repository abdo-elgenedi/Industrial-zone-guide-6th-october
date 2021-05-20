<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Factory extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description','image','cat_id','email','password','status','created_at','updated_at','map_status'
    ];


    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function mobiles(){

        return $this->hasMany(Mobile::class,'fact_id');
    }

    public function products(){

        return $this->hasMany(Product::class,'fact_id');
    }

    public function services(){

        return $this->hasMany(Service::class,'fact_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
