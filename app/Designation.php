<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    /**
     * Get the users for department
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
