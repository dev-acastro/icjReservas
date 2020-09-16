
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @if(isset($reservas[0]))
                    <div class="card-header" style="text-align: center">Reservas Realizadas para {{$dias[date('w', strtotime($reservas[0]->date))]}} {{date('d', strtotime($reservas[0]->date))}} {{date('h:i', strtotime($reservas[0]->date))}}{{date('A', strtotime($reservas[0]->date))}} <div style="margin-bottom: 10px; text-align: center; float: right; font-size: 10px"></div></div>



                <div class="container">

                        <table class="table table-striped" >
                            <thead class="thead-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Culto Reservado</th>
                                <th>Espacios</th>
                                <th>Correo Electronico</th>
                            </tr>
                            </thead>
                            @foreach($reservas as $reserva)
                                <tr>
                                <td>{{$reserva->name}}</td>
                                <td>{{$dias[date('w', strtotime($reserva->date))]}} {{date('d', strtotime($reserva->date))}} {{date('h:i', strtotime($reserva->date))}}{{date('A', strtotime($reserva->date))}} </td>
                                <td style="text-align: center">{{$reserva->seats}}</td>
                                <td>{{$reserva->email}}</td>
                                </tr>
                            @endforeach
                        </table>

                    @else
                        <div class="card-header" style="text-align: center">No se encuentra ninguna reserva para este horario</div>
                        <div style="text-align: center"><a href="{{route('attendees.index')}}"class="btn btn-primary">Regresar</a></div>
                     @endif
                </div>
            </div>
        </div>
    </div>
</div>


