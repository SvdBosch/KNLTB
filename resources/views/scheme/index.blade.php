@extends('layouts.app')

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success" style="text-align: center" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="container">
        @if (Auth::user())
            <button class="btn btn-primary d-print-none" onclick="window.print();" style="margin-bottom: 10px;">Printen</button>
        @endif
        <ul class="nav nav-tabs d-print-none" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="competition_a" data-toggle="tab" href="#a" role="tab" aria-controls="a-tab" aria-selected="true">Beginners poule (Poule A) <span class="badge badge-secondary">{{count($gamesA)}}</span> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="competition_b" data-toggle="tab" href="#b" role="tab" aria-controls="b-tab" aria-selected="false">Gevorderde poule (Poule B) <span class="badge badge-secondary">{{count($gamesB)}}</span></a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="a" role="tabpanel" aria-labelledby="a-tab">
                <h2 class="d-none d-print-block">Beginners poule (Poule A)</h2>
                @if (!$gamesA->isEmpty())
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Wedstrijd ID</th>
                                <th scope="col">Deelnemer 1</th>
                                <th scope="col">Deelnemer 2</th>
                                <th>Uitslag</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($gamesA as $game)
                            @if ($game->competition_id === 0)
                                <tr>
                                    <td>{{$game->id}}</td>
                                    <td>{{ $game->participant_id_1 }}</td>
                                    <td>{{ $game->participant_id_2 }}</td>
                                    @if (Auth::user())
                                        @if ($game->played == 0)
                                        <td><a class="btn btn-primary btn-xs d-print-none" href="/results/create/{{ $game->id }}">Voeg uitslag toe</a></td>
                                        @endif
                                    @endif
                                    @if ($game->played == 1)
                                        <td>{{ $game->score }}</td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>Er zijn geen wedstrijden gepland voor deze poule</h2>
                @endif
            </div>
            <div class="tab-pane fade" id="b" role="tabpanel" aria-labelledby="b-tab">
                <h2 class="d-none d-print-block">Gevorderde poule (Poule B)</h2>
                @if (!$gamesB->isEmpty())
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
                        @foreach($gamesB as $game)
                            @if ($game->competition_id === 1)
                                <tr>
                                    <td>{{$game->id}}</td>
                                    <td>{{ $game->participant_id_1 }}</td>
                                    <td>{{ $game->participant_id_2 }}</td>
                                    @if (Auth::user())
                                        @if ($game->played == 0)
                                            <td><a class="btn btn-primary btn-xs d-print-none" href="/results/create/{{ $game->id }}">Voeg uitslag toe</a></td>
                                        @endif
                                    @endif
                                    @if ($game->played == 1)
                                        <td>{{ $game->score }}</td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>Er zijn geen wedstrijden gepland voor deze poule</h2>
                @endif
            </div>
        </div>
    </div>
@endsection