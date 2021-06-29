<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Appointment extends Model
{
    //
    protected $fillable=[

        "dealer_id",
        "psychologist_id",
        "status",
        "client_id",
        "reason",
        "device",
        "start_date",
        "finish_date",
        "backcolor",
        "description",
        "creator_id",


    ];

    public function dealer()
    {
        return $this->belongsTo("App\Dealer");
    }

    public function client()
    {
        return $this->belongsTo("App\Client");
    }
    public function clientJoin($clientId)
    {
        return $this
            ->join('clients',  'clients.id', '=', 'appointments.client_id')
            ->join("dealers", "dealers.id", "=", "appointments.psychologist_id")
            ->select("clients.name", "appointments.*", "dealers.name as psychologist")
            ->where("client_id", $clientId)
            ->where("appointments.dealer_id", Auth::user()->dealer_id)
            ->get();


    }
    public function clientsJoin()
    {
        return $this
            ->join('clients', 'clients.id', '=', 'appointments.client_id')
            ->join("dealers", "dealers.id", "=", "appointments.psychologist_id")
            ->select("clients.name", "appointments.*", "dealers.name as psychologist")
            ->orderBy("id", 'desc')
            ->where("appointments.dealer_id", Auth::user()->dealer_id)
            ->get();




    }

    public function appointmentsDate($request)
    {
        return $this
            ->join('clients', 'clients.id', '=', 'appointments.client_id')
            ->join("dealers", "dealers.id", "=", "appointments.psychologist_id")
            ->select("clients.name", "appointments.*", "dealers.name as psychologist")
            ->whereBetWeen("start_date", [$request->start, $request->finish])
            ->where("appointments.dealer_id", Auth::user()->dealer_id)
            ->get();




    }
    public function appointmentsName($request)
    {
        return $this
            ->join('clients', 'clients.id', '=', 'appointments.client_id')
            ->join("dealers", "dealers.id", "=", "appointments.psychologist_id")
            ->select("clients.name", "appointments.*", "dealers.name as psychologist")
            ->where("clients.name","like", "%".$request->name."%")
            ->where("appointments.dealer_id", Auth::user()->dealer_id)
            ->get();




    }
    public function clientsOnlyJoin()
    {
        return $this
            ->join('clients', 'clients.id', '=', 'appointments.client_id')
            ->select("clients.name","clients.id as clientId", "appointments.*", "appointments.id as appointmentId")
            ->where("appointments.dealer_id", Auth::user()->dealer_id)
            ->get();




    }

    protected $attributes=[
      "reason"=> "Kilo",

    ];
}
