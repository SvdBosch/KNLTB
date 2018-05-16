<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Auth;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


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
        //Get the ticket that needs to be edited
        $game = App\game::where('id', $id)->first();

        // Change the participant ids to names
        $name1 = App\participant::select('name')
            ->where('id', $game->participant_id_1)
            ->first();
        $name2 = App\participant::select('name')
            ->where('id', $game->participant_id_2)
            ->first();

        $game->participant_id_1 = $name1->name;
        $game->participant_id_2 = $name2->name;

        //check if the user is loged in.
        if (Auth::check()) {

            return view('results.edit', ['game' => $game]);

        } else {
            return redirect('/');
        }
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
