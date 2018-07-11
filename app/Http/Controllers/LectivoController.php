<?php

namespace App\Http\Controllers;

use App\Lectivo;
use Illuminate\Http\Request;
use DB;

class LectivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Lectivos.index');
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
        DB::beginTransaction();
        try{
            Lectivo::create($request->All());
            DB::commit();
            return 1;
        }catch(Exception $e){
            DB::rollback();
            return -1;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lectivo  $lectivo
     * @return \Illuminate\Http\Response
     */
    public function show(lectivo $lectivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lectivo  $lectivo
     * @return \Illuminate\Http\Response
     */
    public function edit(lectivo $lectivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lectivo  $lectivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lectivo $lectivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lectivo  $lectivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(lectivo $lectivo)
    {
        //
    }
}
