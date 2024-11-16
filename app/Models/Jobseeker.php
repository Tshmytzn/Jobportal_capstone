<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

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
        'js_province',
        'js_city',
        'js_baranggay',
        'js_address',
        'js_email',
        'js_resume',
        'js_contactnumber',
        'js_password',
        'js_accstatus',
        'js_image',
        'js_badge'
    ];

    protected function casts(): array
    {
        return [
            'js_firstname' => 'encrypted',
            'js_middlename' => 'encrypted',
            'js_lastname' => 'encrypted',
            'js_suffix' => 'encrypted',
            'js_gender' => 'encrypted',
            'js_province' => 'encrypted',
            'js_city' => 'encrypted',
            'js_baranggay' => 'encrypted',
            'js_address' => 'encrypted',
            'js_contactnumber' => 'encrypted',
            'js_accstatus' => 'encrypted',
        ];
    }

}
