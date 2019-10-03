<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable =  ['card_holder','card_number','expiration_date','payment_type','amount','payment_date'];
    public function room()
    {
        return $this->belongsTo(Room::class);

    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
