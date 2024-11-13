<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetails extends Model
{
    use HasFactory;
    protected $table = 'job_details';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'job_title',
        'category_id',
        'agency_id',
        'job_image',
        'job_location',
        'job_type',
        'skills_required',
        'job_vacancy',
        'other_skills',
        'job_salary',
        'job_description',
        'job_status',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id', 'id');
    }

}
