<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

        protected $table = 'job_categories';

        protected $primaryKey = 'id';

        public $timestamps = true;

        protected $fillable = [
            'name',
            'description',
            'image',
        ];


        protected $casts = [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];

        public function jobDetails()
        {
            return $this->hasMany(JobDetails::class, 'category_id', 'id');
        }
        public function jobs()
        {
            return $this->hasMany(JobDetails::class, 'category_id', 'id');
        }


}
