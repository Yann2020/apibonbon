<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ["id","food_name","admin_id"];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function foodStock()
    {
        return $this->hasMany(FoodsStock::class);
    }

    public function itemsToTake()
    {
        return $this->belongsToMany(ItemsToTake::class,"items_foods","food_id","items_to_take_id");
    }
}
