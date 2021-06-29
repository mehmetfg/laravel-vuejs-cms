<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {

        return response()->json(["model"=> Client::orderBy("id", 'desc')->where("dealer_id", Auth::user()->dealer_id)->get()]);

    }

    public function show(Client $client)
    {
        return response()->json(["model"=> $client]);
    }

    public function searchName($name){

        $model=Client::Where("name","like", "%".$name."%")->first();
        if($model) {
            return response()->json(["error"=> 0,"model" => $model]);
        }
        else{

            return response()->json(["error"=> 1 ,"model" => new Client()]);
        }
    }
    public function store(Request $request , Client $client)
    {
        try{



            $client->create(array_merge($request->all(), ["dealer_id"=> Auth::user()->dealer_id]));

            return  response()->json(__("messages.add"));


        }
        catch (Exception $e){
            echo  $e->getMessage();
            return  response()->json(__("messages.un_add"));

        }


    }




    public function update(Request $request, Client $client)
    {
        try{


            $client->fill($request->all())->save();

            return  response()->json(__("messages.update"));

        }
        catch (Exception $e){

            echo  $e->getMessage();

            return  response()->json(__("messages.un_update"));
        }
    }

    public function destroy(Client $client)
    {
        try{


            $client->delete();


            return  response()->json(__("messages.delete"));


        }
        catch (Exception $e){
            echo  $e->getMessage();

            return  response()->json(__("messages.un_delete"));
        }
    }
}
