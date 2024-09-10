<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobseeker extends Model
{
    use HasFactory;

    protected $table = 'jobseeker_details'; // Maps to the jobseeker_details table

    protected $primaryKey = 'js_id'; // Primary key is js_id

    public $incrementing = true; // Primary key is auto-incrementing

    public $timestamps = true; // Enable created_at and updated_at timestamps

    protected $fillable = [
        'js_firstname',
        'js_middlename',
        'js_lastname',
        'js_suffix',
        'js_gender',
        'js_address',
        'js_email',
        'js_resume',
        'js_contactnumber',
        'js_password',
    ];

    // Optionally, you can add some accessor or mutator methods for password hashing, etc.
    public function setPasswordAttribute($value)
    {
        $this->attributes['js_password'] = bcrypt($value);
    }
}
