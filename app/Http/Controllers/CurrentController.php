<?php

namespace App\Http\Controllers;

use App\Client;
use App\Current;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CurrentController extends Controller
{
    public function index()
    {
        $data=new Current();

        return response()->json(["model"=>$data->curentWithClient()]);

    }

    public function show(Client $client)
    {
        return response()->json(["model"=> $client->currents]);
    }

    public function store(Request $request , Current $current)
    {
        try{


            $current->create(array_merge($request->all(), ["dealer_id"=> Auth::user()->dealer_id]));

            return  response()->json(__("messages.add"));


        }
        catch (Exception $e){
            echo  $e->getMessage();
            return  response()->json(__("messages.un_add"));

        }


    }




    public function update(Request $request, Current $current)
    {
        try{


            $current->fill($request->all())->save();

            return  response()->json(__("messages.update"));

        }
        catch (Exception $e){

            echo  $e->getMessage();

            return  response()->json(__("messages.un_update"));
        }
    }


    public  function getCurrentBeetweenDate(Request $request){

        $data=new Current();

        return response()->json(["model"=> $data->getCurrentBeetweenDate($request)]);


    }
    public function destroy(Current $current)
    {
        try{


            $current->delete();


            return  response()->json(__("messages.delete"));


        }
        catch (Exception $e){
            echo  $e->getMessage();

            return  response()->json(__("messages.un_delete"));
        }
    }
}
