@extends('layouts.topbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reservas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    @foreach ($reservas as $reserva)
                        {{$reserva->name}}
                    @endforeach




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
