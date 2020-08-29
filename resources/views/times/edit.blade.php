@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Servicio</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('times.update', ['time' => $time->id]) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="day" class="col-md-4 col-form-label text-md-right">Dia</label>

                            <div class="col-md-6">
                                <select id="day" class="form-control" @error('day') is-invalid @enderror name="day" value="{{ $time->day }}"  required autocomplete="day">
                                    <option value="Lunes" selected>Lunes</option>
                                    <option value="Martes">Martes</option>
                                    <option value="Miercoles">Miercoles</option>
                                    <option value="Jueves">Jueves</option>
                                    <option value="Viernes">Viernes</option>
                                    <option value="Sabado">Sabado</option>
                                    <option value="Domingo">Domingo</option>
                                </select>


                                @error('day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">Hora</label>

                            <div class="col-md-6">
                                <input id="time" type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ $time->time }}" required autocomplete="time">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="seats" class="col-md-4 col-form-label text-md-right">Numero de Asientos Disponibles</label>
                            <div class="col-md-6">
                                <input type="number" min="50" max="500" id="seats" name="seats" value="{{$time->seats}}" class="form-control @error('time') is-invalid @enderror" required autocomplete="seats">
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
                                   Actualizar
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
