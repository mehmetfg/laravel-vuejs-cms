<?php

namespace App\Http\Controllers;

use App\Client;
use App\Form;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Type;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index($client_id, $type)
    {
        return response()->json([Form::where(["client_id"=>$client_id, "type"=> $type])->first()]);

    }

    public function show($client_id, $type)
    {
        $form=Form::where(["client_id"=>$client_id, "type"=> $type])->first();



        return response()->json(["model"=> $form]);

    }
    public function getWithClient(Client $client){


        return response()->json(["model"=> $client->forms]);

    }

    public function store(Request $request , Form $form)
    {
        try{




            $form->create(array_merge($request->all(), ["dealer_id"=> Auth::user()->dealer_id]));;

            return  response()->json(__("messages.add"));


        }
        catch (Exception $e){
            echo  $e->getMessage();
            return  response()->json(__("messages.un_add"));

        }


    }




    public function update(Request $request, Form $form)
    {
        try{


            $form->fill($request->all())->save();

            return  response()->json(__("messages.update"));

        }
        catch (Exception $e){

            echo  $e->getMessage();

            return  response()->json(__("messages.un_update"));
        }
    }

    public function destroy(Form $form)
    {
        try{


            $form->delete();


            return  response()->json(__("messages.delete"));


        }
        catch (Exception $e){
            echo  $e->getMessage();

            return  response()->json(__("messages.un_delete"));
        }
    }
}
