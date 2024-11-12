<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobseekerSkillAssessmentResult extends Model
{
    use HasFactory;
    protected $table = 'jobseeker_skill_assessment_results';
    protected $primaryKey = 'jsar_id';

    protected $fillable = [
        'jobseeker_id',
        'section_id',
        'score',
        'total_items',
        'percentage'
    ];
}
