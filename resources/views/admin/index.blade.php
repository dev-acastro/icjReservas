@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cultos Disponibles </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="col-sm-12">
                    @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>

                <div class="container">



                        <table class="table table-striped" >
                            <thead class="thead-light">
                            <tr>
                                <th>Dia</th>
                                <th>Hora</th>
                                <th>Asientos </th>
                            </tr>
                            </thead>
                            @foreach($times as $time)
                                <tr>


                                    <td><a href="{{route('reservaciones', ['date'=>$time->date])}}">{{$dias[date('w', strtotime($time->date))]}} {{date('d', strtotime($time->date))}}  </a></td>
                                    <td>{{date('h:i', strtotime($time->date))}} {{date('A', strtotime($time->date))}}</td>
                                    <td>{{$time->seats}}</td>

                                </tr>
                            @endforeach
                        </table>


                </div>






            </div>
        </div>
    </div>
</div>
@endsection
