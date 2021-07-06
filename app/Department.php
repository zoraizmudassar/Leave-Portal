<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * Get the users for department
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
    // validator rules
    public static $rules = array(
        'name' => 'required|unique:departments,id'
    );
}
