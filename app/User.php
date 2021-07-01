<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Notifications\LeaveApplied;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','designation_id','department_id','emp_category_id','team_lead','lq_exp', 'created_at', 'allowed_leave', 'balance_leave', 'start_lq'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function sendNotification($leave)
    {
        $this->notify(new LeaveApplied($leave));
    }
    
    /**
     * Get the applications for user
     */
    public function applications()
    {
        return $this->hasMany('App\Application');
    }
    public function notifications()
    {
        return $this->belongsTo('App\Notification');
    }
    /**
     * Get the department that owns the user.
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
    
    /**
     *  Get the designation that owns the user.
     */
    public function designation()
    {
        return $this->belongsTo('App\Designation');
    }
    
    /**
     * Get the post that owns the comment.
     */
    public function empCategory()
    {
        return $this->belongsTo('App\EmpCategory');
    }
    
    public function userdetail()
    {
        return $this->hasMany('App\userdetail');
    }
    
}
