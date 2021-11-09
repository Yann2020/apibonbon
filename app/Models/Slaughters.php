<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slaughters extends Model
{
    protected $fillable = ["id","quantity","specie_name","reason","description","farmer_id","stock_items_to_sale_id"];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
    public function stock()
    {
        return $this->belongsTo(StockItemsToSale::class);
    }
    
    public function batche()
    {
        return $this->belongsToMany(Batche::class,'batches_slaughters','batche_id','slaughter_id');
    }
}
