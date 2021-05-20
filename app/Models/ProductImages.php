<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table='product_images';

    protected $fillable=['pro_id','image','created_at','updated_at'];
}
