<?php

namespace App\Http\Controllers;

use App;
Use DB;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the games where played is 0, no game result exists
        $gamesA = App\Game::where('competition_id', 0)->get();
        $gamesB = App\Game::where('competition_id', 1)->get();

        // Competition A: Change the participant ids to names
        foreach ($gamesA as $game) {
            // get participant names
            $name1 = App\participant::select('name')
                ->where('id', $game->participant_id_1)
                ->first();
            $name2 = App\participant::select('name')
                ->where('id', $game->participant_id_2)
                ->first();

            //Set participant names
           $game->participant_id_1 = $name1->name;
           $game->participant_id_2 = $name2->name;

           // Check if game is played, if so, ad score
           if ($game->played == 1) {
               $result = App\Result::select('score')->where('game_id', $game->id)->first();
               $game->score = $result->score;
           }
        }

        // Competition B: Change the participant ids to names
        foreach ($gamesB as $game) {
            // get participant names
            $name1 = App\participant::select('name')
                ->where('id', $game->participant_id_1)
                ->first();
            $name2 = App\participant::select('name')
                ->where('id', $game->participant_id_2)
                ->first();

            //Set participant names
            $game->participant_id_1 = $name1->name;
            $game->participant_id_2 = $name2->name;

            // Check if game is played, if so, ad score
            if ($game->played == 1) {
                $result = App\Result::select('score')->where('game_id', $game->id)->first();
                $game->score = $result->score;
            }
        }

        return view('scheme/index', ['gamesA' => $gamesA, 'gamesB' => $gamesB]);
    }

    /**
     * Generate games based on competition_id
     *
     * @param  int  $competition_id
     *
     * @return \Illuminate\Http\Response
     */
    public function generate($competition_id){

        // get the participants of both competitions
        $participants = App\participant::where('competition_id', $competition_id)->get();
        $participants2 = App\participant::where('competition_id', $competition_id)->get();

        //create the game
        foreach ($participants as $participant) {
            foreach ($participants2 as $participant2) {

                // Check if participant isn't himself
                if (!($participant->id == $participant2->id)) {
                    $game = new App\Game;

                    $game->participant_id_1 = $participant->id;
                    $game->participant_id_2 = $participant2->id;
                    $game->competition_id = $competition_id;
                    $game->played = 0;

                    $game->save();
                }
            }
        }

        return redirect('/scheme');
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
