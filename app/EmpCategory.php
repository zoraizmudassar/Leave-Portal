<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpCategory extends Model
{
    /**
     * Get the applications for user
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
