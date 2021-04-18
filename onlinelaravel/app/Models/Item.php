<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "itemmaster";
    protected $primaryKey = "imid";
    const CREATED_AT = "created";
    const UPDATED_AT = "modify";
}