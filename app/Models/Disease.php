<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $fillable = ["id","name","farmer_id"];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function healthSchedule()
    {
        return $this->hasMany(HealthSchedule::class);
    }
}
