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
                @if (!$competitionA->isEmpty())
                    <script> var minError = false; var maxError = false;</script>

                    @if (count($competitionA) <= 4)
                        <script> minError = true;</script>
                    @elseif (count($competitionA) > 8)
                        <script> maxError = true;</script>
                    @endif
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th scope="col">Deelnemers naam</th>
                            <th scope="col">School</th>
                            <th scope="col">Klas</th>
                            <th scope="col">Opleidings niveau</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($competitionA as $key => $participant)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$participant->name}}</td>
                                    <td>{{ $participant->school }}</td>
                                    <td>{{ $participant->class }}</td>
                                    <td>{{ $participant->level }}</td>
                                    @if (!$startedA)
                                        <td><a class="btn btn-danger btn-xs" name="delete" href="/participants/delete/{{ $participant->id }}">Verwijder</a></td>
                                    @endif
                                 </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (!$startedA)
                        <a href="/scheme/generate" name="createCompetition" data-competition="0" class="btn btn-success">Wedstrijdschema poule A aanmaken</a>
                    @else
                        <a href="" name="deleteCompetition" data-competition="0" class="btn btn-danger">Wedstrijdschema poule A resetten</a>
                    @endif
                @else
                    <h3>Er zijn geen aanmeldingen voor deze poule</h3>
                @endif



            </div>
            <div class="tab-pane fade" id="b" role="tabpanel" aria-labelledby="b-tab">
                @if (!$competitionB->isEmpty())
                    <script> var minError = false; var maxError = false;</script>

                    @if (count($competitionB) <= 4)
                        <script> minError = true;</script>
                    @elseif (count($competitionB) > 8)
                        <script> maxError = true;</script>
                    @endif
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th scope="col">Deelnemers naam</th>
                            <th scope="col">School</th>
                            <th scope="col">Klas</th>
                            <th scope="col">Opleidings niveau</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($competitionB as $key => $participant)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$participant->name}}</td>
                                <td>{{ $participant->school }}</td>
                                <td>{{ $participant->class }}</td>
                                <td>{{ $participant->level }}</td>
                                @if (!$startedB)
                                    <td><a class="btn btn-danger btn-xs" name="delete" href="/participants/delete/{{ $participant->id }}">Verwijder</a></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if (!$startedB)
                        <a href="/scheme/generate" name="createCompetition" data-competition="1" class="btn btn-success">Wedstrijdschema poule B aanmaken</a>
                    @else
                        <a href="" name="deleteCompetition" data-competition="1" class="btn btn-danger">Wedstrijdschema poule B resetten</a>
                    @endif
                @else
                    <h3>Er zijn geen aanmeldingen voor deze poule</h3>
                @endif

            </div>
        </div>
    </div>
@endsection