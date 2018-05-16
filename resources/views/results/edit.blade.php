@extends('layouts.app')

@section('content')
    <div class="container">
        <h5 class="card-title">Wedstrijd ID: {{$game->id}}</h5>
        <div class="row">

            <div class="col">
                <div class="card" style="width:100%;">
                    <div class="card-body">
                        <h5 class="card-title">Deelnemer 1: {{ $game->participant_id_1 }}</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <form action="">
                <div class="result" style="padding-top: 20px; text-align:center">
                    <input type="number" max="6" min="0" maxlength="1" style="width:40px;">
                    -
                    <input type="number" max="6" min="0" maxlength="1" style="width:40px;">

                </div>
                    <div class="button" style="text-align:center; padding-top:10px;">
                        <input type="submit" value="toevoegen" class="btn btn-primary" >
                    </div>

                </form>
            </div>
            <div class="col">
                <div class="card" style="width:100%;">
                    <div class="card-body">
                        <h5 class="card-title">Deelnemer 1: {{ $game->participant_id_2 }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection