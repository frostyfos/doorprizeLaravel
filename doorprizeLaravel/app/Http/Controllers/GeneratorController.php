<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Participant;
use App\Prize;
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
        
        $totalRequest = $request->totalGenerate;
        $totalParticipant = Participant::all()->where('claimed', 0);

       if($totalRequest == 0){
        return view('generator', compact('randomParticipant', 'randomPrizes'));
       } 

       if($totalRequest > count($totalParticipant)){
            $totalRequest = count($totalParticipant);
       }

        $randomParticipant = Participant::inRandomOrder()->where('claimed', 0)->limit($totalRequest)->get();
        $randomPrizes = Prize::inRandomOrder()->where('qty','>', 0)->get();

        //return(count($totalParticipant));

        //update data participant / prize
        //insert claimed data

        
        return view('generator', compact('randomParticipant', 'randomPrizes'));
    }

    function update(Request $request){

    }
}
