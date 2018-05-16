@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#a" role="tab" aria-controls="home" aria-selected="true">Poule A</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#b" role="tab" aria-controls="profile" aria-selected="false">Poule B</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="a" role="tabpanel" aria-labelledby="home-tab">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Tijd</th>
                        <th scope="col">Deelnemer 1</th>
                        <th scope="col">Deelnemer 2</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($games as $game)
                        @if ($game->competition_id === 0)
                            <tr id="{{ $game->id }}">
                                <th scope="row">{{ date('H:i',strtotime($game->time)) }}</th>
                                <td>{{ $game->participant_id_1 }}</td>
                                <td>{{ $game->participant_id_2 }}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="b" role="tabpanel" aria-labelledby="profile-tab">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Tijd</th>
                        <th scope="col">Deelnemer 1</th>
                        <th scope="col">Deelnemer 2</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($games as $game)
                        @if ($game->competition_id === 1)
                            <tr id="{{ $game->id }}">
                                <th scope="row">{{ date('H:i',strtotime($game->time)) }}</th>
                                <td>{{ $game->participant_id_1 }}</td>
                                <td>{{ $game->participant_id_2 }}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection