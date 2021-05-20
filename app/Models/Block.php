<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $table='blocks';
    protected $fillable=['name','position','type','x','y','w','h','d','p','fact_id'];

    public $timestamps=false;

    public function factory(){
        return $this->belongsTo(Factory::class,'fact_id','id');
    }
}
