<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Reserva Realizada</title>
</head>


<body>
<div  style="text-align: center;
                                    display: flex;
                                    justify-content: center;
                                    padding: 0" >

    <div style="background-color: white;
                                            margin: 20px auto;
                                            padding: 30px 10px;
                                            border-bottom: #1b4b72 1px solid;">

        <div style="background-color: #1b4b72; padding: 30px; margin-bottom: 50px">
            <img src="https://i.ibb.co/r6S8spK/Sin-t-tulo-1.png" alt="Sin-t-tulo-1" height="80px" border="0">
        </div>




        <h2>Has reservado satisfactoriamente tu puesto</h2>
        <h2>Te pedimos porfavor seguir todas las normas de higiene</h2>

        <h3>Detalles de la Reserva:</h3>
        <table style="text-align: left">
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
        <p>No Olvides los siguientes lineamientos</p>
        <img src="https://i.ibb.co/3MwBxbL/Whats-App-Image-2020-09-09-at-9-12-13-AM.jpg" alt="Protocolo" border="0">

    </div>
</div>
</body>
</html>
