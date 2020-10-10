@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cultos Disponibles  <a class="btn btn-success" style="float: right">Cultos Pasados</a></div>

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
                <div class="container" style="display: flex; flex-direction: column; position: relative">
                            {{--<thead class="thead-light">
                            <tr>
                                <th>Dia</th>
                                <th>Hora</th>
                                <th>Disponibilidad</th>
                              <!--  <th>Asientos</th>
                                <th>Asientos Disponibles</th>
                                <th>Reservas Realizadas </th> -->
                                <th>Acciones</th>
                            </tr>
                            </thead>--}}
                            @foreach($times as $time)
                                @if($time->date > $dateFormatted)
                             {{--   <tr style="border-left:  4px solid {{$time->availableseats <= 4 ? 'red' : 'blue' }}; border-right: 4px solid {{$time->availableseats <= 4 ? 'red' : 'blue' }};  " >
                                    <td><a style="color: black" href="{{route('attendees.show', $time->date)}}">{{$dias[date('w', strtotime($time->date))]}} {{date('d', strtotime($time->date))}}  </a></td>
                                    <td>{{date('h:i', strtotime($time->date))}}{{date('A', strtotime($time->date))}}</td>
                                    <td>{{$time->seats}}</td>
                                    <td>{{$time->availableseats}}</td>
                                    <td>{{$time->seats - $time->availableseats  }}</td>
                                    <td><a href="{{route('print', ['date'=>$time->date])}}" ><i class="fas fa-print">  </i></a><a href="{{route('see', ['date'=>$time->date])}}"  ><i class="fas fa-eye"></i></a></td>

                                </tr>--}}

                                    <div class="col-12" style="padding-left: 0; padding-right: 0; padding-bottom: 20px; margin-bottom: 0px; border-bottom: #999797 1px solid; background-image: url('https://i.ibb.co/3zBm92g/descarga.jpg'); background-repeat: repeat-y; background-size:{{((($time->seats - $time->availableseats)*100) / $time->seats)}}% ">
                                            <div class="col-sm-12 col-md-6" style="display: flex; padding: 0 5px;">
                                                <div class="col-8 col-sm-8" style="line-height: 48px">
                                                    <a style="color: black" href="{{route('attendees.show', $time->date)}}"><p style="font-size: 18px">{{$dias[date('w', strtotime($time->date))]}} {{date('d', strtotime($time->date))}} {{date('h:i', strtotime($time->date))}} {{date('A', strtotime($time->date))}}</p></a>
                                                </div>
                                                <div class="col-4 col-sm-4" style="text-align: center" >
                                                    <span style="font-size: 30px; color: #3876ab">{{round(((($time->seats - $time->availableseats)*100) / $time->seats))}}%</span>
                                                </div>
                                            </div>
                                        <div class="col-sm-12 col-md-6" style="padding: 0 5px;">
                                            <span style="font-size: 13px; margin-bottom: 0px; border-right: 1px solid #d7d3d3; padding-right: 5px;"><strong>Disponibles:</strong> {{$time->seats}}</span>
                                            <span style="font-size: 13px; margin-bottom: 0px; border-right: 1px solid #d7d3d3; padding-right: 5px;"><strong>Reservados: </strong>{{$time->seats - $time->availableseats}}</span>
                                            <span style="font-size: 13px; margin-bottom: 0px; "><strong>Libres:</strong> {{$time->availableseats}}</span>
                                        </div>
                                    </div>

                            @endif
                            @endforeach


                </div>






            </div>
        </div>
    </div>
</div>
@endsection
