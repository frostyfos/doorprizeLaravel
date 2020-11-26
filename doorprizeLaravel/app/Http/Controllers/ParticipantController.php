<?php

namespace App\Http\Controllers;

use App\Participant;
use App\PrizeResult;
use Illuminate\Http\Request;
use File;
use Session;

use App\Imports\ParticipantImport;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $participants = Participant::paginate(20);
        return view('participant', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //truncate
        Participant::truncate();
        PrizeResult::truncate();

        $file = $request->file('file');
        
		// membuat nama file unik
		$fileName = $file->getClientOriginalName();

        $file->move('excelFile',$fileName);


        $import = new ParticipantImport();
        Excel::import($import, public_path('/excelFile/'.$fileName));

        File::delete(public_path('/excelFile/'.$fileName));

        return redirect('/participant');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }
}
