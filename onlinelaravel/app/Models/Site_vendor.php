<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site_vendor extends Model
{
    protected $table = "vendorsitemaster";
    protected $primaryKey = "vsid";
    const CREATED_AT = "created";
    const UPDATED_AT = "modify";
}