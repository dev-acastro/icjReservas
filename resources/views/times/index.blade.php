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

                        <a href="{{route('times.create')}}" class="btn btn-success btn-block" style="margin-bottom: 20px;">Añadir Culto</a>

                        <table class="table table-striped" >
                            <thead class="thead-light">
                                <tr>
                                    <th>Dia</th>
                                    <th>Hora</th>
                                    <th>Asientos </th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            @foreach($times as $time)
                                <tr>

                                    <td>{{$time->day}}</td>
                                    <td>{{$time->time}}</td>
                                    <td>{{$time->seats}}</td>
                                    <td><a class="btn btn-primary" href="{{route('times.edit', ["time" => $time->id])}}">Editar</a></td>
                                    <td>
                                        <form action="{{ route('times.edit', $time->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Eliminar</button>
                                        </form>
                                    </td>

                                </tr>

                            @endforeach

                        </table>

                </div>

                {{$times->links()}}




            </div>
        </div>
    </div>
</div>
@endsection
