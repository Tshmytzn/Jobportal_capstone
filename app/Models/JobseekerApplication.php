<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobseekerApplication extends Model
{
    use HasFactory;

    protected $table = 'jobseeker_application';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'js_id',
        'job_id',
        'peso_form_id',
        'skill_results_id',
        'applicant_name',
        'applicant_email',
        'applicant_phone',
        'cover_letter',
        'resume_file',
        'js_status',
    ];
}
