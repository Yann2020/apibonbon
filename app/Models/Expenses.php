<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable = ["id","reason","amount","admin_id"];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
