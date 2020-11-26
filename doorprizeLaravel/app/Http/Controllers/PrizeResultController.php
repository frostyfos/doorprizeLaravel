<?php

namespace App\Http\Controllers;

use App\PrizeResult;
use App\Exports\ResultExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class PrizeResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $results = PrizeResult::all();
        return view('result', compact('results'));
    }

    public function export()
    {
        return Excel::download(new ResultExport, 'prize_result.xlsx');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PrizeResult  $prizeResult
     * @return \Illuminate\Http\Response
     */
    public function show(PrizeResult $prizeResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PrizeResult  $prizeResult
     * @return \Illuminate\Http\Response
     */
    public function edit(PrizeResult $prizeResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PrizeResult  $prizeResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrizeResult $prizeResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PrizeResult  $prizeResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrizeResult $prizeResult)
    {
        //
    }
}
