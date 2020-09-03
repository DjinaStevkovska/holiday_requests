<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Managers extends Model
{
    public function Users()
    {
        return $this->belongsTo(User::class);
    }
}
