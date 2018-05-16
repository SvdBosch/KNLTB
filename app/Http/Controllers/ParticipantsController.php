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
        $confirm = View::make('modals.confirmbox');
        // Get competition a an b and send it to the view
        $competitionA = App\participant::where('competition_id', 0)->get();
        $competitionB = App\participant::where('competition_id', 1)->get();

        return view('participants/index', ['competitionA' => $competitionA, 'competitionB' => $competitionB, 'confirm' => $confirm]);
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
