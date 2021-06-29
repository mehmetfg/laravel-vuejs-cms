<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assay extends Model
{
    //
    protected $fillable=[
            "dealer_id",
            "client_id",
            "type",
            "description",
            "status",
            "creator_id",


    ];

    public function dealer()
    {
        return $this->belongsTo("App\Dealer");
    }
}
