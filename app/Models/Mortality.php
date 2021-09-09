<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mortality extends Model
{
    protected $fillable = ["id","number","causes","specie_name","batche_id","farmer_id"];
    

    public function farmer()
    {
        return $this->BelongsTo(Farmer::class);
    }

    public function batche()
    {
        return $this->belongsTo(Batche::class);
    }
}
