@extends('layouts.topbar')

@section('content')

<body>
<div  style="text-align: center;
                                    display: flex;
                                    justify-content: center;
                                    padding: 10px;" >

    <div style="background-color: white;
                                            margin: 0px auto;
                                            padding: 0px 0px;
                                            border-bottom: #1b4b72 1px solid;">

        <div style="background-color: #1b4b72; padding: 30px; margin-bottom: 50px">
            <img src="https://i.ibb.co/r6S8spK/Sin-t-tulo-1.png" alt="Sin-t-tulo-1" width="100%" border="0">
        </div>




        <h2>Has reservado satisfactoriamente tu puesto</h2>
        <h2>Te pedimos porfavor seguir todas las normas de higiene</h2>

        <h3>Detalles de la Reserva:</h3>
        <div style="text-align: center">
        <table class="table thead-dark table-striped" style="text-align: left; width: auto; margin: 30px auto;">
                <tr>
                    <th>Nombre: </th>
                    <td>{{$details['Name']}}</td>
                </tr>
                <tr>
                    <th>Fecha:</th>
                    <td>{{$dias[date('w', strtotime($details['Date']))]}} {{date('d', strtotime($details['Date']))}} a las  {{date('h-i', strtotime($details['Date']))}} {{date('A', strtotime($details['Date']))}}</td>
                </tr>
                <tr>
                    <th>Asientos:</th>
                    <td>{{$details['Seats']}} Reservados</td>
                </tr>

        </table>
        </div>
        <h2>No Olvides los siguientes lineamientos:</h2>
       <div style="text-align: center"> <img src="https://i.ibb.co/3MwBxbL/Whats-App-Image-2020-09-09-at-9-12-13-AM.jpg" alt="Protocolo" border="0" width="100%"></div>

    </div>
</div>
</body>
</html>
@endsection
