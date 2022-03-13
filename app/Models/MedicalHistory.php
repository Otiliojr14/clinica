<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    public function unv_personal()
    {
        return $this->belongsTo(UnvPersonal::class);
    }

    public function cl_personal_nurse()
    {
        return $this->belongsTo(ClPersonal::class, 'cl_personal_id_nurse' ,'unv_personal_id');
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

}
