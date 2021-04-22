<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'txnid','payu_id','orderable_id', 'orderable_type'
    ];

    public function orderable()
    {
        return $this->morphTo();
    }
}
