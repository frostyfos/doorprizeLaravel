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
        
        $currentParticipant = Participant::where('claimed', 0)->get();
        $currentPrize = Prize::where('qty','>',0)->get();
        $currentPrizeQty = Prize::where('qty','>',0)->sum('qty');

        return view('generator', compact('randomParticipant', 'randomPrizes', 'currentParticipant', 'currentPrize', 'currentPrizeQty'));
    }

    function generator(Request $request){
        $randomParticipant = [];
        $randomPrizes = [];

        $prizeList = [];

        $totalRequest = $request->totalGenerate;
        $totalParticipant = Participant::all()->where('claimed', 0);

        $currentPrizeQty = Prize::where('qty','>',0)->sum('qty');

        if($totalRequest == 0){
        return view('generator', compact('randomParticipant', 'randomPrizes'));
        } 

        if($totalRequest > $currentPrizeQty){
            $totalRequest = $currentPrizeQty;
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

        $currentParticipant = Participant::where('claimed', 0)->get();
        $currentPrize = Prize::where('qty','>',0)->get();
        $currentPrizeQty = Prize::where('qty','>',0)->sum('qty');

        return view('generator', compact('randomParticipant', 'prizeList', 'currentParticipant', 'currentPrize', 'currentPrizeQty'));
    }

    function update(Request $request){

    }
}
