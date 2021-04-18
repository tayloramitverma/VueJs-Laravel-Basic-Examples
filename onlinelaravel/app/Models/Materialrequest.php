<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materialrequest extends Model
{
    protected $table = "metrialrequestmaster";
    protected $primaryKey = "mrmid";
    const CREATED_AT = "created";
    const UPDATED_AT = "modify";

    public function materialrequestdetails()
    {
    	return $this->hasMany("App\Models\Materialrequestdetail","mrmid");
    }
    public function sites()
    {
    	return $this->hasOne("App\Models\Site","smid","smid");
    }
    public function items()
    {
    	return $this->belongsToMany("App\Models\Item","metrialrequestdetail","mrmid","imid");
    }
    public function material_units()
    {
    	return $this->belongsToMany("App\Models\Materialunit","metrialrequestdetail","mrmid","muid");
    }
}
