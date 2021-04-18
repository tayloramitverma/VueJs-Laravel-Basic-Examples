<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materialrequestdetail extends Model
{
    protected $table = "metrialrequestdetail";
    protected $primaryKey = "mrdid";
    const CREATED_AT = "created";
    const UPDATED_AT = "modify";
    protected $fillable = ["mrmid","imid","qty","unit_price","muid","remarks"];
}
