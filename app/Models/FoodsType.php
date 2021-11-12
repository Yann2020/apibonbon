<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodsType extends Model
{
    protected $fillable = ["id","name","admin_id","created_at","updated_at"];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function foodStock()
    {
        return $this->hasOne(FoodsType::class);
    } 
}
