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
        ];
    
    
        protected $casts = [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
}
