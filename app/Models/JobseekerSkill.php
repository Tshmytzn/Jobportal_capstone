<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobseekerSkill extends Model
{
    use HasFactory;

    protected $table = 'jobseeker_skills';

    protected $primaryKey = 'skill_id';

    protected $fillable = [
        'skill_name',
        'skill_desc',
    ];

    public $timestamps = true;

}
