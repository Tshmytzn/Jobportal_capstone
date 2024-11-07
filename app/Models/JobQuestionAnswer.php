<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobQuestionAnswer extends Model
{
    use HasFactory;
    protected $table = 'job_question_answer';

    // Define the fillable fields
    protected $fillable = [
        'jq_id',
        'answer',
        'status',
    ];
}
