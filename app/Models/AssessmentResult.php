<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobseeker_id',
        'assessment_id',
        'correct_answers', // Add this
        'total_questions', // Add this
        'score',
        'passed',
    ];

    public function jobseeker()
    {
        return $this->belongsTo(Jobseeker::class);
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
