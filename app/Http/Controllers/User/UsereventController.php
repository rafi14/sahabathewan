<?php

namespace App\Http\Controllers\User;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsereventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $event = Event::all();

        $search = $request->search;
        $hewan = $request->hewan;
        if ($hewan){
            $event = Event::where('id_animaltype',$hewan)->get();
        }
        if ($search){
            $event = Event::where('name','like','%' . $search . '%')->orWhere('description','like','%' . $search . '%')->get();
        }

        $anjing = $event->filter(function($value, $key){
            return $value->id_animaltype == 1;
        });

        $kucing = $event->filter(function($value, $key){
            return $value->id_animaltype == 2;
        });

        return view('modul.event.index',compact('event','anjing','kucing'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
