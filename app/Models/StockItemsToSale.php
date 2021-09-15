<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockItemsToSale extends Model
{
    protected $fillable = ["id","quantity","items_to_sale_id","farmer_id"];

    public function itemsToSale()
    {
        return $this->belongsTo(ItemsToSale::class);
    }

    public function batches()
    {
        return $this->belongsToMany(Batche::class,"batches_stock_items_to_sales","stock_items_to_sale_id","batche_id");
    }

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function slaughter()
    {
        return $this->hasMany(Slaughters::class);
    }
}
