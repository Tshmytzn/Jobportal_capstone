<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobseeker extends Model
{
    use HasFactory;

    protected $table = 'jobseeker_details'; 

    protected $primaryKey = 'js_id'; 

    public $incrementing = true; 

    public $timestamps = true; 

    protected $fillable = [
        'js_firstname',
        'js_middlename',
        'js_lastname',
        'js_suffix',
        'js_gender',
        'js_address',
        'js_email',
        'js_contactnumber',
        'js_password',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['js_password'] = bcrypt($value);
    }
}
