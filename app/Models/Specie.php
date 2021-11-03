<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    protected $fillable = ["id","name","admin_id"];

    public function farmer ()
    {
        return $this->hasOne(Farmer::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /*
        public function healthSchedule()
        {
            return $this->hasMany(HealthSchedule::class);
        }
    */

    public function batches()
    {
        return $this->hasMany(Batche::class);
    }

    public function itemsToSale()
    {
        return $this->hasMany(ItemsToSale::class);
    }
}
