<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactoryCategory extends Model
{
    protected $table='factory_categories';

    protected $fillable=['name','fact_id','created_at','updated_at'];

    public function factories(){
        return $this->belongsTo(Factory::class , 'fact_id');
    }

    public function products(){
        return $this->hasMany(Product::class , 'cat_id');
    }

    public function services(){
        return $this->hasMany(Service::class , 'cat_id');
    }
}
