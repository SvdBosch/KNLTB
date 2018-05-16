<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use View;
use Auth;

class ParticipantsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // this controller can only be used if authentication is correct
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get competition a an b and send it to the view
        $competitionA = App\participant::where('competition_id', 0)->get();
        $competitionB = App\participant::where('competition_id', 1)->get();

        //Check if competition is started
        $startedA = App\Game::where('competition_id', 0)->first();
        $startedB = App\Game::where('competition_id', 1)->first();

        if (!empty($startedA)) {
            $startedA = true;
        } else {
            $startedA = false;
        }

        if (!empty($startedB)) {
            $startedB = true;
        } else {
            $startedB = false;
        }

        return view('participants/index', ['competitionA' => $competitionA, 'competitionB' => $competitionB, 'startedA' => $startedA, 'startedB' => $startedB]);
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
        //get the participant
        $participant = App\Participant::where('id', $id)->first();

        $participant->delete();

        return redirect('/participants');
    }


}
