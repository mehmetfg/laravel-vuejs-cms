<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable=[


        "dealer_id",
        "reason",
        "email",
        "name",
        "phone",
        "home_phone",
        "city",
        "address",
        "creator_id",
        "age",
        "job",
        "contact"


    ];
protected $attributes=[
  "name"=> " ",
  "phone"=>  " ",
  "email"=> " "
];
    public function dealer()
    {
        return $this->belongsTo("App\Dealer");
    }

    public function currents()
    {
        return $this->hasMany("App\Current");
    }
    public  function forms()
    {

        return $this->hasMany("App\Form");

    }
}
