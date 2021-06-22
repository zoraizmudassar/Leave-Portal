<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    /**
     * Get the users for department
     */
    public function applications()
    {
        return $this->hasMany('App\Application');
    }
}
