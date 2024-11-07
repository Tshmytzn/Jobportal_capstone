<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobQuestionTitle extends Model
{
    use HasFactory;
    protected $table = 'job_question_title';

    // Define the fillable fields
    protected $fillable = [
        'jd_id',
        'title',
    ];
}
