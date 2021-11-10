<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mortality extends Model
{
    protected $fillable = ["id","number","cause","specie_name","batche_id","farmer_id"];
    

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function batche()
    {
        return $this->belongsTo(Batche::class);
    }
}
