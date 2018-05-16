@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::user())
            <button class="btn btn-primary d-print-none" onclick="window.print();" style="margin-bottom: 10px;">Printen</button>
        @endif
        <ul class="nav nav-tabs d-print-none" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#a" role="tab" aria-controls="home" aria-selected="true">Poule A</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#b" role="tab" aria-controls="profile" aria-selected="false">Poule B</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="a" role="tabpanel" aria-labelledby="home-tab">
                <h2 class="d-none d-print-block">Beginners poule (Poule A)</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Plaats</th>
                            <th scope="col">Naam</th>
                            <th scope="col">Gespeeld</th>
                            <th scope="col">Gewonnen</th>
                            <th scope="col">Verloren</th>
                            <th scope="col">Punten</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @foreach( $results as $result)
                        @if ($result->competition_id === 0)
                            <tr>
                                <th>{{ $i }}</th>
                                <td>{{ $result->participant_id }}</td>
                                <td>{{ $result->played }}</td>
                                <td>{{ $result->won }}</td>
                                <td>{{ $result->lost }}</td>
                                <td>{{ $result->points }}</td>
                            </tr>
                            @php $i++; @endphp
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="b" role="tabpanel" aria-labelledby="profile-tab">
                <h2 class="d-none d-print-block">Gevorderde poule (Poule B)</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Plaats</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Gespeeld</th>
                        <th scope="col">Gewonnen</th>
                        <th scope="col">Verloren</th>
                        <th scope="col">Punten</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach( $results as $result)
                            @if ($result->competition_id === 1)
                                <tr>
                                    <th>{{ $i }}</th>
                                    <td>{{ $result->participant_id }}</td>
                                    <td>{{ $result->played }}</td>
                                    <td>{{ $result->won }}</td>
                                    <td>{{ $result->lost }}</td>
                                    <td>{{ $result->points }}</td>
                                </tr>
                                @php $i++; @endphp
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection