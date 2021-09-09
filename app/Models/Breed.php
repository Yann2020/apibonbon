<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $fillable = ["id","name","admin_id"];

    public function batche ()
    {
        return $this->belongsTo(Batche::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
