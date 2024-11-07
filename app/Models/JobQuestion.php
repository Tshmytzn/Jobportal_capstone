<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobQuestion extends Model
{
    use HasFactory;
    protected $table = 'job_question';

    // Define the fillable fields
    protected $fillable = [
        'jqt_id',
        'question',
    ];
}
