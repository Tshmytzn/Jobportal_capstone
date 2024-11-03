<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobseekerSkillAnswers extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobseeker_id',
        'question_id',
        'option_id',
        'text_answer',
    ];

    public function jobseeker()
    {
        return $this->belongsTo(Jobseeker::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}

