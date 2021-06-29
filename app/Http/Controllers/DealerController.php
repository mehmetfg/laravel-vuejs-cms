<?php

namespace App\Http\Controllers;

use App\Dealer;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealerController extends Controller
{
    public function index()
    {
        return response()->json(["model"=> Dealer::where("type", 2)->where("dealer_id", Auth::user()->dealer_id)->get()]);

    }
    public function user()
    {
        return response()->json(["model"=> Dealer::where("type", "<>", 1)->where("dealer_id", Auth::user()->id)->get()]);

    }
    public function users($type)
    {
        return response()->json(["model"=> Dealer::where("type", $type)->where("dealer_id", Auth::user()->dealer_id)->get()]);

    }

    public function show(Dealer $dealer)
    {
        return response()->json(["model"=> $dealer]);
    }

    public function store(Request $request , Dealer $dealer)
    {
        try{


           $id= $dealer->create(array_merge($request->all(), ["dealer_id"=> Auth::user()->dealer_id]))->id;

            return  response()->json(array_merge(["id"=>$id],__("messages.add")));


        }
        catch (Exception $e){
            echo  $e->getMessage();
            return  response()->json(__("messages.un_add"));

        }


    }

    public function storeUser(Request $request , Dealer $dealer)
    {
        try{


            $id= $dealer->create(array_merge($request->all(), ["dealer_id"=> Auth::user()->id]))->id;

            return  response()->json(array_merge(["id"=>$id],__("messages.add")));


        }
        catch (Exception $e){
            echo  $e->getMessage();
            return  response()->json(__("messages.un_add"));

        }


    }


    public function update(Request $request, Dealer $dealer)
    {
        try{


            $dealer->fill($request->all())->save();

            return  response()->json(__("messages.update"));

        }
        catch (Exception $e){

            echo  $e->getMessage();

            return  response()->json(__("messages.un_update"));
        }
    }

    public function destroy(Dealer $dealer)
    {
        try{


            $dealer->delete();

            return  response()->json(__("messages.delete"));


        }
        catch (Exception $e){
            echo  $e->getMessage();

            return  response()->json(__("messages.un_delete"));
        }
    }

    public function isActiveSetter(Request $request, Dealer $dealer){

        $dealer->isActive=$request->isActive;
        try{


           $dealer->save();
           return response()->json(__("messages.update"));



        }
        catch (Exception $e){


        return response()->json(__("messages.un_update"));


        }



    }
}
