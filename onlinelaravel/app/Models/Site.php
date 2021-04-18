<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = "sitemaster";
    protected $primaryKey = "smid";
    const CREATED_AT = "created";
    const UPDATED_AT = "modify";
}