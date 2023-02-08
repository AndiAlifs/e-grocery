<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';

    public $timestamps = false;
    protected $primaryKey = 'order_id';
    protected $guarded = [];

    /**
     * Get all of the item for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function item()
    {
        return $this->hasMany(Item::class, 'item_id', 'item_id');
    }
}
