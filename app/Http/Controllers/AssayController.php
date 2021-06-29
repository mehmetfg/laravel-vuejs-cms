<?php

namespace App\Http\Controllers;

use App\Assay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssayController extends Controller
{
    public function index($client_id)
    {

        return response()->json(["model"=> Assay::where("client_id", $client_id)->where("dealer_id", Auth::user()->dealer_id)->get()]);

    }

    public function show(Assay $assay)
    {
        return response()->json(["model"=> $assay]);
    }

    public function store(Request $request , Assay $assay)
    {
        try{


            $assay->create(array_merge($request->all(), ["dealer_id"=> Auth::user()->dealer_id]));

            return  response()->json(__("messages.add"));


        }
        catch (Exception $e){
            echo  $e->getMessage();
            return  response()->json(__("messages.un_add"));

        }


    }




    public function update(Request $request, Assay $assay)
    {
        try{


            $assay->fill($request->all())->save();

            return  response()->json(__("messages.update"));

        }
        catch (Exception $e){

            echo  $e->getMessage();

            return  response()->json(__("messages.un_update"));
        }
    }

    public function destroy(Assay $assay)
    {
        try{


            $assay->delete();


            return  response()->json(__("messages.delete"));


        }
        catch (Exception $e){
            echo  $e->getMessage();

            return  response()->json(__("messages.un_delete"));
        }
    }
}
