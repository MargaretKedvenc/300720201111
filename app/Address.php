<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function asString()
    {
        $address = implode(', ', [
            $this->city->name,
            $this->area->name,
            $this->street,
            $this->house,
            $this->comment,
        ]);

        return trim($address, " \t\n\r\0\x0B,");
    }
}
