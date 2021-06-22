<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\LeaveApplied;

class Application extends Model
{
    use Notifiable;

//    protected $fillable = ['leave_type_id', 'user_id', 'start_from', 'end_to', 'no_of_days'];
    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function sendNotification($leave)
    {
        $this->notify(new LeaveApplied($leave));
    }
    
    /**
     * Get the users for department
     */
    public function leaveType()
    {
        return $this->belongsTo('App\LeaveType');
    }
}
