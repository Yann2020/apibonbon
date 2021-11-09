<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Batche extends Model
{
    protected $fillable = ["id","name","admin_id","breed_id","specie_id","total","cost_per_animal","description","supplier_id","deleted"];

    public function admin ()
    {
        return $this->belongsTo(Admin::class);
    }

    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }

    public function breed ()
    {
        return $this->belongsTo(Breed::class);
    }
    

    public function itemsToTake()
    {
        return $this->belongsToMany(ItemsToTake::class,"batches_items","batche_id","items_to_take_id");
    }

    public function mortalities()
    {
        return $this->hasMany(Mortality::class);
    }

    public function avgAnimalWeight()
    {
        return $this->hasMany(AvgAnimalWeight::class);
    }

    public function healthSchedule()
    {
        return $this->belongsToMany(HealthSchedule::class,"batches_health_schedules","batche_id","health_schedule_id");
    }

    public function stockItemsToSale()
    {
        return $this->belongsToMany(StockItemsToSale::class,"batches_stock_items_to_sales","batche_id","stock_items_to_sale");
    }

    public function slaughter()
    {
        return $this->belongsToMany(Slaughters::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'batches_slaughters');
    }
}
