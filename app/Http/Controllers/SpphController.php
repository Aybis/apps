<?php

namespace App\Http\Controllers;

use App\Spph;
use Illuminate\Http\Request;

class SpphController extends Controller
{
    /**
     * Display a listing of the resource only adminnistrator.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return view('modules.spph.all');
    }


     /**
     * Display a listing of the resource where status draft.
     *
     * @return \Illuminate\Http\Response
     */
    public function draft()
    {
        return view('modules.spph.draft');
    }

    
     /**
     * Display a listing of the resource where status save.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view('modules.spph.list');
    }

     /**
     * Display a listing of the resource where status done.
     *
     * @return \Illuminate\Http\Response
     */
    public function done()
    {
        return view('modules.spph.done');
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.spph.create');
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
     * @param  \App\Spph  $spph
     * @return \Illuminate\Http\Response
     */
    public function show(Spph $spph)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spph  $spph
     * @return \Illuminate\Http\Response
     */
    public function edit(Spph $spph)
    {
        return view('modules.spph.edit', compact($spph));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spph  $spph
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spph $spph)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spph  $spph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spph $spph)
    {
        //
    }
}
