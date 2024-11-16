<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'agency_name',
        'agency_province',
        'agency_city',
        'agency_baranggay',
        'agency_address',
        'email_address',
        'contact_number',
        'landline_number',
        'geo_coverage',
        'employee_count',
        'agency_business_permit',
        'agency_dti_permit',
        'agency_bir_permit',
        'mayors_permit',
        'agency_mayors_permit',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function jobs()
    {
        return $this->hasMany(JobDetails::class, 'agency_id', 'id');
    }
}
