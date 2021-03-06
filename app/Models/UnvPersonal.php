<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnvPersonal extends Model
{
    use HasFactory;

    public function cl_personal()
    {
        return $this->hasOne(ClPersonal::class);
    }
}
