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
        $randomParticipant = Participant::inRandomOrder()->where('claimed', 0)->limit(5)->get();
        $randomPrizes = Prize::inRandomOrder()->where('qty','>', 0)->limit(5)->get();

        //update data participant / prize
        //insert claimed data

        
        return view('generator', compact('randomParticipant', 'randomPrizes'));
    }

    function update(Request $request){

    }
}
