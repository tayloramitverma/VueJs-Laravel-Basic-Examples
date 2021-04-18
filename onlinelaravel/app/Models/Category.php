<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categorymaster";
    protected $primaryKey = "cmid";
    const CREATED_AT = "created";
    const UPDATED_AT = "modify";
}
