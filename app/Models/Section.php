<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'assessment_id',
        'title',
        'description',
        'job_category',
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
