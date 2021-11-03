<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ["id"];

    public function farmer () 
    {
        return $this->hasMany(Farmer::class);
    }

    public function supplier()
    {
        return $this->hasMany(Supplier::class);
    }

    public function species ()
    {
        return $this->hasMany(Specie::class);
    }

    public function batches()
    {
        return $this->hasMany(Batche::class);
    }

    public function breeds()
    {
        return $this->hasMany(Breed::class);
    }

    public function status_schedule(){
        return $this->hasMany(StatusSchedule::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expenses::class);
    }

    public function foodsType()
    {
        return $this->hasMany(FoodsType::class);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function itemsToSale()
    {
        return $this->hasMany(ItemsToSale::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function foodStock()
    {
        return $this->hasMany(FoodsStock::class);
    }
}

