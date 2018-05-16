<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Auth;

class ResultsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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

            return view('results/create', ['game' => $game]);

        } else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'game_id' => 'required|numeric',
            'participant_1' => 'required|numeric',
            'participant_2' => 'required|numeric',
        ]);

        // Messages for error handling. TODO
        $messages = [
            'required'    => 'Het veld :attribute is verplicht',
            'numeric'    => 'Dit veld moet een nummer zijn',
        ];

        // create new result and set values
        $result = new App\Result;

        $result->game_id = $request['game_id'];
        $result->score = $request['participant_1'] . '-' . $request['participant_2'];
        $result->save();

        // get the played game and set played on true
        $game = App\Game::where('id', $request['game_id'])->first();
        $game->played = 1;
        $game->save();

        // Get the participants from played game
        $participant_score_1 = App\Score::where('participant_id', $game->participant_id_1)->first();
        $participant_score_2 = App\Score::where('participant_id', $game->participant_id_2)->first();

        // If Participant 1 hasn't played a game, create a new score
        if (empty($participant_score_1)) {
            $participant_score_1 = new App\Score;
            $participant_score_1->participant_id = $game->participant_id_1;
        }

        $participant_score_1->played += 1;

        // Check if player 1 has lost or won
        if ($request['participant_1'] < $request['participant_2']) {
            $lost = true;
        } else {
            $lost = false;
        }

        if ($lost) {
            $participant_score_1->lost += 1;
        } else {
            $participant_score_1->won += 1;
        }


        $participant_score_1->points += $request['participant_1'];
        $participant_score_1->save();


        // If Participant 2 hasn't played a game, create a new score
        if (empty($participant_score_2)) {
            $participant_score_2 = new App\Score;
            $participant_score_2->participant_id = $game->participant_id_2;
        }

        $participant_score_2->played += 1;

        // Check if player 2 has lost or won
        if ($request['participant_2'] < $request['participant_1']) {
            $lost = true;
        } else {
            $lost = false;
        }

        if ($lost) {
            $participant_score_2->lost += 1;
        } else {
            $participant_score_2->won += 1;
        }

        $participant_score_2->points += $request['participant_2'];
        $participant_score_2->save();

        return redirect('/scheme');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
