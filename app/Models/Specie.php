<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    protected $fillable = ["id","name","admin_id"];

    public function isManaged ()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(Admin::class);
    }

    public function healthSchedule()
    {
        return $this->hasMany(HealthSchedule::class);
    }

    public function batches()
    {
        return $this->hasMany(Batche::class);
    }

    public function itemsToSale()
    {
        return $this->hasMany(ItemsToSale::class);
    }
}
