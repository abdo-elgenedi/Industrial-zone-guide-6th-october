<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceImages extends Model
{
    protected $table='service_images';

    protected $fillable=['ser_id','image','created_at','updated_at'];
}
