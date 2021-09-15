<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodsStock extends Model
{
    protected $fillable = ["id","quantity","cost","description","foods_type_id","food_id","admin_id"];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function foodType()
    {
        return $this->belongsTo(FoodsType::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
