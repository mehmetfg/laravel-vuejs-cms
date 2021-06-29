<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    //
    protected $fillable=[


        "dealer_id",
        "type",
        "name",
        "email",
        "password",
        "authorized",
        "phone",
        "fax",
        "tax",
        "taxadmin",
        "address",
        "status",
        "logo",
        "domain",

        "isActive",
    ];

    public function appointments()
    {
        return $this->hasMany("App\Appointment");
    }

    public function currents()
    {
        return $this->hasMany("App\Current");

    }

    public function clients()
    {
        return $this->hasMany("App\Client");
    }

    public function opinions()
    {
        return $this->hasMany("App\Client");
    }

    public function assays()
    {
        return  $this->hasMany("App\Assay");
    }

    public function dealer()
    {
        return $this->belongsTo("App\Dealer");
    }
}
