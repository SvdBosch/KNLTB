<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all scores and all participants
        $scores = App\Score::orderBy('points', 'DESC')->get();
        $participants = App\Participant::All();

        //set participant ids into names and add competition_id
        foreach ($scores as $score) {
            foreach ($participants as $participant) {
                if ($participant->id == $score->participant_id) {
                    $score->participant_id = $participant->name;
                    $score->competition_id = $participant->competition_id;
                }
            }
        }

        return view('standings/index', ['results' => $scores]);
    }
}
