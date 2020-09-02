<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class HolidayRequests extends Model
{
    protected $guarded = [];

    public function HolidayRequests()
    {
        return $this->belongsTo(User::class);
    }


}
