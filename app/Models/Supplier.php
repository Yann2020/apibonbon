<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ["id","name","product","admin_id","deleted"];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function batche()
    {
        return $this->hasMany(Batche::class);
    }
}
