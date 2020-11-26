<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Participant;
use App\Prize;
use App\PrizeResult;

use Session;



class GeneratorController extends Controller
{
    //
    function index(){
        $randomParticipant = [];
        $randomPrizes = [];
        return view('generator', compact('randomParticipant', 'randomPrizes'));
    }

    function generator(Request $request){
        $randomParticipant = [];
        $randomPrizes = [];

        $prizeList = [];

        
        
        $totalRequest = $request->totalGenerate;
        $totalParticipant = Participant::all()->where('claimed', 0);

       if($totalRequest == 0){
        return view('generator', compact('randomParticipant', 'randomPrizes'));
       } 

       if($totalRequest > count($totalParticipant)){
            $totalRequest = count($totalParticipant);
       }

        $randomParticipant = Participant::inRandomOrder()->where('claimed', 0)->limit($totalRequest)->get();
        

        //return(count($totalParticipant));

        for ($i=0; $i < $totalRequest ; $i++) { 
            $randomPrizes = Prize::inRandomOrder()->where('qty','>', 0)->limit(1)->get();
 
            //insert table prize result
            $prizeResult = new PrizeResult;
            $prizeResult->nik = $randomParticipant[$i]->nik;
            $prizeResult->name = $randomParticipant[$i]->name;
            $prizeResult->prizeName = $randomPrizes[0]->prizeName;
            $prizeResult->save();

            //update data qty prize
            $prizeUpdate = Prize::find($randomPrizes[0]->id);
            $prizeUpdate->qty = $prizeUpdate->qty - 1;
            $prizeUpdate->save();

            //update data claim participant
            $participantUpdate = Participant::find($randomParticipant[$i]->id);
            $participantUpdate->claimed = 1;
            $participantUpdate->save();

            array_push($prizeList, $randomPrizes[0]->prizeName);
        }

        // return $prizeList;

        //update data participant / prize
        //insert claimed data

        
        return view('generator', compact('randomParticipant', 'prizeList'));
    }

    function update(Request $request){

    }
}
