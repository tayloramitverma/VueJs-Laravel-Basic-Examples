<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materialunit extends Model
{
    protected $table = "metrrialunitmaster";
    protected $primaryKey = "muid";
    const CREATED_AT = "created";
    const UPDATED_AT = "modify";
}
