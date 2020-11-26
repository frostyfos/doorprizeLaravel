<?php

namespace App\Http\Controllers;

use App\Prize;
use App\PrizeResult;
use Illuminate\Http\Request;
use File;
use Session;

use App\Imports\PrizeImport;
use Maatwebsite\Excel\Facades\Excel;

class PrizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prizes = Prize::paginate(20);
        return view('prize', compact('prizes'));
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
        Prize::truncate();
        PrizeResult::truncate();

        $file = $request->file('file');
        
		// membuat nama file unik
		$fileName = $file->getClientOriginalName();

        $file->move('excelFile',$fileName);


        $import = new PrizeImport();
        Excel::import($import, public_path('/excelFile/'.$fileName));

        File::delete(public_path('/excelFile/'.$fileName));

        return redirect('/prize');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function show(Prize $prize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function edit(Prize $prize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prize $prize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prize $prize)
    {
        //
    }
}
