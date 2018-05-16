@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="competition_a" data-toggle="tab" href="#a" role="tab" aria-controls="a-tab" aria-selected="true">Beginners poule (Poule A)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="competition_b" data-toggle="tab" href="#b" role="tab" aria-controls="b-tab" aria-selected="false">Gevorderde poule (Poule B)</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="a" role="tabpanel" aria-labelledby="a-tab">
                @if (!$games->isEmpty())
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Wedstrijd ID</th>
                                <th scope="col">Deelnemer 1</th>
                                <th scope="col">Deelnemer 2</th>
                                @if (Auth::user())
                                    <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($games as $game)
                            @if ($game->competition_id === 0)
                                <tr>
                                    <td>{{$game->id}}</td>
                                    <td>{{ $game->participant_id_1 }}</td>
                                    <td>{{ $game->participant_id_2 }}</td>
                                    @if (Auth::user())
                                        <td><a class="btn btn-primary btn-xs" href="/results/store/{{ $game->id }}">Voeg uitslag toe</a></td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>Er zijn geen wedstrijden gepland</h2>
                @endif
            </div>
            <div class="tab-pane fade" id="b" role="tabpanel" aria-labelledby="b-tab">
                @if (!$games->isEmpty())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Wedstrijd ID</th>
                            <th scope="col">Deelnemer 1</th>
                            <th scope="col">Deelnemer 2</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($games as $game)
                            @if ($game->competition_id === 1)
                                <tr>
                                    <td>{{$game->id}}</td>
                                    <td>{{ $game->participant_id_1 }}</td>
                                    <td>{{ $game->participant_id_2 }}</td>
                                    <td><a href="/results/add/{{ $game->id }}">Voeg uitslag toe</a></td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>Er zijn geen wedstrijden gepland</h2>
                @endif
            </div>
        </div>
    </div>
@endsection