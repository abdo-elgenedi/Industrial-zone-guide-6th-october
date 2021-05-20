<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table='services';

    protected $fillable=['name','description','price','unit','status','image','fact_id','cat_id','created_at','updated_at'];

    public function category(){
        return $this->belongsTo(FactoryCategory::class,'cat_id');
    }

    public function factory(){

        return $this->belongsTo(Factory::class,'fact_id');
    }

    public function images(){
        return $this->hasMany(ServiceImages::class,'ser_id');
    }
}
