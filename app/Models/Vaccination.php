<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    protected $fillable = ["id","name","animal_numbers","vaccinated_by",];
}
