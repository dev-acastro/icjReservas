@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Servicios</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('times.store') }}">
                        @csrf

{{--{                       Fecha del Culto--}}

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">fecha</label>
                            <div class="col-md-6">
                                <input id="date" type="datetime-local" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

{{--                        Asientos Disponibles --}}

                        <div class="form-group row">
                            <label for="seats" class="col-md-4 col-form-label text-md-right">Numero de Asientos Disponibles</label>
                            <div class="col-md-6">
                                <input type="number" min="50" max="500" id="seats" name="seats" value="{{old('seats')}}" class="form-control @error('time') is-invalid @enderror" required autocomplete="seats">
                                @error('seats')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Añadir
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
