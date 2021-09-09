<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvgAnimalWeight extends Model
{
    protected $fillable = ["id","max_animal_weight","min_animal_weight","species_name","overall_average","batche_id","farmer_id"];
    
    public function batche()
    {
        return $this->belongsTo(Batche::class);
    }

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
}
