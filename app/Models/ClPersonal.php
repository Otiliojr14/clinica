<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClPersonal extends Model
{
    use HasFactory;

    public function unv_personal()
    {
        return $this->belongsTo(UnvPersonal::class);
    }
}
