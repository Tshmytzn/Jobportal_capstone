<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobseekerAssessmentResult extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'jobseeker_assessment_result';

    // Define the fillable attributes (to allow mass assignment)
    protected $fillable = [
        'jobseeker_id',
        'assessment_id',
        'score',
        'passed',
    ];

    // Define the types for any attributes, if needed
    protected $casts = [
        'score' => 'integer',
        'passed' => 'string',  // You can change this if `passed` is a boolean
    ];
}
