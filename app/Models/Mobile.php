<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    protected $table='mobiles';

    protected $fillable=['mobile','fact_id','created_at','updated_at'];

    public function factory(){
        return $this->belongsTo(Factory::class , 'fact_id');
    }
}
