<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobseekerGlobalAnswer extends Model
{
    use HasFactory;

    protected $table = 'jobseeker_globalanswers';

    protected $fillable = [
        'js_id',
        'question_id',
        'option_id',
        'answer_text',
    ];

}
