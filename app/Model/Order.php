<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'master_order_id',
        'purchaseble_id',
        'purchaseble_type',
        'order_date',
        'price',
    ];
    public function orderItem()
    {
        return $this->morphTo();
    }
}
