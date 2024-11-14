<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFeedbacks extends Model
{
    protected $fillable = [
        'application_id', 
        'user_id', 
        'feedback_type', 
        'rating', 
        'comments'
    ];

    public function application()
    {
        return $this->belongsTo(JobseekerApplication::class, 'application_id');
    }

}
