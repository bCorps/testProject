<?php

namespace App\Http\Controllers;

use App\Models\secpass;
use App\Http\Requests\StoresecpassRequest;
use App\Http\Requests\UpdatesecpassRequest;

class SecpassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoresecpassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresecpassRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\secpass  $secpass
     * @return \Illuminate\Http\Response
     */
    public function show(secpass $secpass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\secpass  $secpass
     * @return \Illuminate\Http\Response
     */
    public function edit(secpass $secpass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesecpassRequest  $request
     * @param  \App\Models\secpass  $secpass
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesecpassRequest $request, secpass $secpass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\secpass  $secpass
     * @return \Illuminate\Http\Response
     */
    public function destroy(secpass $secpass)
    {
        //
    }
}
