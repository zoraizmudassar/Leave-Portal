<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionsGroup extends Model
{
    /**
     * Get the applications for user
     */
    public function permissions()
    {
        return $this->hasMany('App\Permission');
    }
}
