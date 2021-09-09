<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemsToSale extends Model
{
    protected $fillable = ["id","name","cost_per_item","specie_id","admin_id"];

    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function stockItemsToSale()
    {
        return $this->hasMany(StockItemsToSale::class);
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class,"items_to_sale_sales","items_to_sale_id","sale_id");
    }
}
