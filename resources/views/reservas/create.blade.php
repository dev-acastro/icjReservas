@extends('layouts.topbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reservar </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reservas.store') }}" id="ReservasForm">
                        @csrf

                        <div class="form-group row">
                            <label for="name0" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name0" type="text" class="form-control @error('name0') is-invalid @enderror" name="name0" value="{{ old('name0') }}" required autocomplete="name0" autofocus>

                                @error('name0')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email0" class="col-md-4 col-form-label text-md-right">Correo Electronico</label>

                            <div class="col-md-6">
                                <input id="email0" type="email0" class="form-control @error('email0') is-invalid @enderror" name="email0" value="{{ old('email0') }}" required autocomplete="email0">

                                @error('email0')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="seats" class="col-md-4 col-form-label text-md-right">Numero de Asientos</label>
                            <div class="col-md-6">
                                <select id="seats" class="form-control" @error('seats') is-invalid @enderror name="seats" >
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="reservasExtras" class="form-group">

                        </div>


                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Seleccionar Culto</label>
                            <div class="col-md-6">
                                <select id="date" class="form-control" @error('date') is-invalid @enderror name="date" >
                                    @foreach($times as $time)
                                        @if($time->seats > 4)
                                        <option value="{{$time->id}}">{{$dias[date('w', strtotime($time->date))]}} {{date('d', strtotime($time->date))}} a las  {{date('h-i', strtotime($time->date))}} {{date('A', strtotime($time->date))}}-- {{$time->seats}} Asientos  Disponibles</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{-- Confirmaciones --}}
                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">
                           <input type="checkbox" name="medidasConf" id="medidasConf" >

                            </div>
                            <label  class="col-form-label text-md-left col-md-6">Confirmo no presentar ninguno de los sintomas comunes de COVID19</label>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">
                                <input type="checkbox" name="medidasHigiene" id="medidasHigiene">

                            </div>
                            <label  class="col-form-label text-md-left col-md-6">Me comprometo a seguir todas las normas de higuiene para ingresar a Iglesia Josue asi como portar en todo momento mi mascarilla </label>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-block btn-primary align-content-center" id="submitReservation" disabled>
                                    Reservar
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
