<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusSchedule extends Model
{
    protected $fillable = ["id","title","admin_id"];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    
    public function healthSchedule()
    {
        return $this->hasMany(HealthSchedule::class);
    }
}
