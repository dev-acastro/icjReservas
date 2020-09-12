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


                    <table class="table table-striped">
                        <thead>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Asientos Reservados</th>
                            <th>Acompañantes</th>
                        </thead>
                        <tbody>
                        @foreach ($reservas as $reserva)
                            <tr>
                                <td>{{$reserva->name}}</td>
                                <td>{{$dias[date('w', strtotime($reserva->date))]}} {{date('d', strtotime($reserva->date))}}  {{date('h:i', strtotime($reserva->date))}} {{date('A', strtotime($reserva->date))}}</td>
                                <td>{{$reserva->seats}}</td>
                               <td>@if($reserva->companions)
                                       {{json_encode($reserva->companions)}}
                                   @endif
                               </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>








                </div>
            </div>
        </div>
    </div>
</div>
@endsection
