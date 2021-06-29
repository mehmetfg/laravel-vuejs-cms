<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{


    public function index(Appointment $appointment, $clientId)
    {
       return response()->json(["model"=> $appointment->clientJoin($clientId)]);

    }

    public function load(Appointment $appointment)
    {


        foreach ($appointment->clientsOnlyJoin() as $item){



            $data[]=array(
                "url"=>"/appointment/edit/".$item->clientId."/".$item->appointmentId,
              "id"=> $item->id,
                "title"=> $item->name.",  ".$item->reason."-".$item->description,
                "start"=> $item->start_date,
                "end"=>  Carbon::parse($item->start_date)->addHour(),
                "color"=>$item->backcolor




            );



        }
        return response()->json(["model"=> $data]);

    }
    public function list(Appointment $appointment)
    {
        return response()->json(["model"=> $appointment->clientsJoin()]);

    }
    public function show(Appointment $appointment)
    {
        return response()->json(["model"=> $appointment]);
    }
    public function getDate(Request $request)
    {

       $date= new Appointment();


        return response()->json(["model"=> $date->appointmentsDate($request)]);
    }
    public function getWithName(Request $request)
    {

        $date= new Appointment();


        return response()->json(["model"=> $date->appointmentsName($request)]);
    }
    public function store(Request $request , Appointment $appointment)
    {
       try{


          $appointment->create(array_merge($request->all(), ["dealer_id"=> Auth::user()->dealer_id]));

          return  response()->json(__("messages.add"));


       }
       catch (Exception $e){
           echo  $e->getMessage();
           return  response()->json(__("messages.un_add"));

       }


    }

    public function  storeWithClient(Request $request, Appointment $appointment){

        try{


            $client_id=Client::create(["name" => $request->name,"dealer_id"=> Auth::user()->dealer_id])->id;

            $yenideger=array_merge($request->all(), ["client_id"=> $client_id,"dealer_id"=> Auth::user()->dealer_id]);
            $appointment->create($yenideger);

            return  response()->json(__("messages.add"));


        } catch (Exception $e) {
            echo  $e->getMessage();
            return  response()->json(__("messages.un_add"));
        }
    }


    public function update(Request $request, Appointment $appointment)
    {
        try{


            $appointment->fill($request->all())->save();

            return  response()->json(__("messages.update"));

        }
        catch (Exception $e){

           echo  $e->getMessage();

            return  response()->json(__("messages.un_update"));
        }
    }

    public function destroy(Appointment $appointment)
    {
        try{


            $appointment->delete();


            return  response()->json(__("messages.delete"));


        }
        catch (Exception $e){
            echo  $e->getMessage();

            return  response()->json(__("messages.un_delete"));
        }
    }

}
