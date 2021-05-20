<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

    protected $fillable=['name','color','created_at','updated_at'];

    public function factories(){
        return $this->hasMany(Category::class , 'cat_id');
    }
}
