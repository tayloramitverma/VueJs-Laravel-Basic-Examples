<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'price', 'description'];

    public function categories(){

    	return $this->belongsToMany(Category::class);
    	
    }
}
