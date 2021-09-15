<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemsToTake extends Model
{
    protected $fillable = ["id","total_take","specie_name","food_id","farmer_id"];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function foods()
    {
        return $this->belongsTo(Food::class);
    }

    public function batches()
    {
        return $this->belongsToMany(Batche::class,"batches_items","items_to_take_id","batche_id");
    }
}
