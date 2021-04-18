<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = ['dob', 'bio', 'facebook', 'twitter', 'github'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

