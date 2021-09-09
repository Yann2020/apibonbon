<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemsToTake extends Model
{
    protected $fillable = ["id","total_take","specie_name","farmer_id"];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class,"foods_items","items_to_take_id","specie_name","farmer_id");
    }

    public function batches()
    {
        return $this->belongsToMany(Batche::class,"batches_items","items_to_take_id","batche_id");
    }
}
