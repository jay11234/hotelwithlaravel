<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class CheckSheet extends Model
{
    protected $fillable = ['start_time', 'end_time', 'total_cycle'];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
