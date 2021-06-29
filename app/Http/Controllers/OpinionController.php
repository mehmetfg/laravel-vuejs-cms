<?php

namespace App\Http\Controllers;

use App\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpinionController extends Controller
{
    public function index($client_id)
    {
        return response()->json(["model"=> Opinion::where(["client_id"=> $client_id, "type"=>1])->get()]);

    }
    public function formIndex($client_id)
    {
        return response()->json(["model"=> Opinion::where(["client_id"=> $client_id, "type"=>2])->get()]);

    }
    public function show(Opinion $opinion)
    {
        return response()->json(["model"=> $opinion]);
    }

    public function store(Request $request , Opinion $opinion)
    {
        try{


            $opinion->create(array_merge($request->all(), ["dealer_id"=> Auth::user()->dealer_id]));

            return  response()->json(__("messages.add"));


        }
        catch (Exception $e){
            echo  $e->getMessage();
            return  response()->json(__("messages.un_add"));

        }


    }




    public function update(Request $request, Opinion $opinion)
    {
        try{


            $opinion->fill($request->all())->save();

            return  response()->json(__("messages.update"));

        }
        catch (Exception $e){

            echo  $e->getMessage();

            return  response()->json(__("messages.un_update"));
        }
    }

    public function destroy(Opinion $opinion)
    {
        try{


            $opinion->delete();


            return  response()->json(__("messages.delete"));


        }
        catch (Exception $e){
            echo  $e->getMessage();

            return  response()->json(__("messages.un_delete"));
        }
    }
}
