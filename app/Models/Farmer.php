<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $fillable = ["id","admin_id","specie_id"];

    public function admin ()
    {
        return $this->belongsTo(Admin::class);
    }

    public function specie ()
    {
        return $this->belongsTo(Specie::class);
    }

    public function disease()
    {
        return $this->hasMany(Disease::class);
    } 

    public function mortality()
    {
        return $this->hasMany(Mortality::class);
    }

    public function itemsToTake()
    {
        return $this->hasMany(ItemsToTake::class);
    }

    public function avgAnimalWeight()
    {
        return $this->hasMany(AvgAnimalWeight::class);
    }

    public function stockItemsToSale()
    {
        return $this->hasMany(StockItemsToSale::class);
    }

    public function healtSchedule()
    {
        return $this->hasMany(HealthSchedule::class);
    }

    public function slaughter()
    {
        return $this->hasMany(Slaughters::class);
    }
}
