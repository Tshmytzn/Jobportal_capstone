<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobseekerPesoForm extends Model
{
    use HasFactory;

    protected $table = 'jobseeker_pesoform';

    protected $primaryKey = 'peso_id';

    protected $fillable = [
        'js_id',
        'skill_id',
        'peso_srsid',
        'peso_fullname',
        'peso_birthdate',
        'peso_age',
        'peso_gender',
        'peso_civilstatus',
        'peso_city',
        'peso_baranggay',
        'peso_street',
        'peso_email',
        'peso_tel',
        'peso_cell',
        'peso_employment',
        'peso_educ',
        'peso_position',
        'peso_skills',
        'peso_work',
        'peso_4ps',
        'peso_pwd',
        'peso_registration',
        'peso_remarks',
        'peso_office',
        'peso_type',
        'peso_class',
        'peso_program',
        'peso_event',
        'peso_transaction',
    ];

    public $timestamps = true;
}
