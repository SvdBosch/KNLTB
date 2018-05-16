@extends('layouts.app')

@section('content')
    @php
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
    @endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="school" class="col-md-4 col-form-label text-md-right">{{ __('School') }}</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('school') ? ' is-invalid' : '' }}" name="school" id="school"  required>
                                    <option value="">Selecteer School</option>
                                    <option value="school 1">School 1</option>
                                    <option value="school 2">School 2</option>
                                    <option value="school 3">School 3</option>
                                    <option value="school 4">School 4</option>
                                </select>
                            </div>

                            @if ($errors->has('school'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('school') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('Klas') }}</label>

                            <div class="col-md-6">
                                <input id="class" type="text" class="form-control" name="class" value="{{ old('class') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Opleidings niveau') }}</label>

                            <div class="col-md-6">
                                <input id="level" type="text" class="form-control" name="level" value="{{ old('level') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="competition" class="col-md-4 col-form-label text-md-right">{{ __('Speel niveau') }}</label>
                            <div class="col-md-6">
                                @if (!$startedA)
                                    <label class="radio-inline"><input name="competition_id" type="radio" value="0">{{ __('Beginner') }}</label>
                                @endif
                                @if (!$startedB)
                                    <label class="radio-inline"><input name="competition_id" type="radio" value="1">{{ __('Gevorderd') }}</label>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                @if (!$startedA || !$startedB)
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                @else
                                    <div class="alert alert-danger" role="alert">
                                        U kunt u helaas niet registreren omdat de poule's zijn al gestart.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
