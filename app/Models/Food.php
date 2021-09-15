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
        return $this->hasOne(ItemsToTake::class);
    }
}
