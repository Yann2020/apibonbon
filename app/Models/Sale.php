<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ["id","quantity","earn","customer_name","description","specie_name","admin_id"];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function itemsToSales()
    {
        return $this->belongsToMany(ItemsToSale::class,"items_to_sale_sales","sale_id","items_to_sale_id");
    }
}
