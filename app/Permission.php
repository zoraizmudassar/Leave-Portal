<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public $guarded = [];
    
    /**
     * Get the post that owns the comment.
     */
    public function permissionsGroup()
    {
        return $this->belongsTo('App\PermissionsGroup');
    }
}
