<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Current extends Model
{
    //
    protected $fillable=[

        "dealer_id",
        "client_id",
        "type",
        "quentity",
        "kind",
        "definition",
        "price",
        "total",
        "currency",
        "date",
        "creator_id",


    ];

    public function dealer()
    {
        return $this->belongsTo("App\Dealer");
    }
    public  function client(){
        return $this->belongsTo("App\Client");
    }
    public  function curentWithClient(){

        return $this
            ->join("clients", "currents.client_id", "=", "clients.id")
            ->select("currents.*", "clients.name as name")
            ->where("currents.dealer_id", Auth::user()->dealer_id)
            ->get();

    }

    public  function getCurrentBeetweenDate($request){

      return  $this->whereBetWeen("date", [$request->start, $request->finish])
            ->get();
    }
}
