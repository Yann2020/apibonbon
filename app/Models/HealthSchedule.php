<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthSchedule extends Model
{
    protected $fillable = ["id","description","specie_name","farmer_id","disease_id","status_schedule_id","scheduled_at"];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function Disease()
    {
        return $this->belongsTo(Disease::class);
    }

    public function status_schedule()
    {
        return $this->belongsTo(StatusSchedule::class); #just wait until i'll create the specific table 
    }

    public function batches()
    {
        return $this->belongsToMany(Batche::class,"batches_health_schedules","health_schedule_id","batche_id");
    }
}
