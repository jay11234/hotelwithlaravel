<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['room_status'];
    public function houseKeeper()
    {
        return $this->belongsTo(Housekeeper::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
