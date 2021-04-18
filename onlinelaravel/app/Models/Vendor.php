<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = "vendormaster";
    protected $primaryKey = "vid";
    const CREATED_AT = "created";
    const UPDATED_AT = "modify";

    public function sites()
    {
    	return $this->belongsToMany("App\Models\Site","vendorsitemaster","vid","smid");
    }
}