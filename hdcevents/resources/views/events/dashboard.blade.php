@extends('layouts.main')

@section('title','Dasboard')
@section('content')

<div class="col-md10 offset-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Participantes</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach($events as $event)
        <tr>
            <td scropt='row'>{{$loop->index+1}}</td>
            <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
            <td>{{count($event->users)}}</td>
            <td>
                <div class="d-inline-block">
                    <a href="/events/edit/{{$event->id}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                </div>
                <div class="d-inline-block">
                    <form action="/events/{{$event->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn"> <ion-icon name="trash-outline"></ion-icon> Deletar</button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>
</table>

    @else
    <p>Voce ainda não tem eventos, <a href="/events/create">Criar evento</a></p>
    @endif
</div>


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@else

@endif


<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que estou participando</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">
   @if(count($eventsasparticipant ) > 0):
    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Participantes</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach($eventsasparticipant as $event)
        <tr>
            <td scropt='row'>{{$loop->index+1}}</td>
            <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
            <td>{{count($event->users)}}</td>
            <td>
               
                <form action="/events/leave/{{$event->id}}" method="POST">
                @csrf 
                @method("DELETE")
                <button type="submit" class="btn btn-danger delete-btn">
                    <ion-icon name="trash-outline"></ion-icon>
                    Sair do evento
                </button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
</table>

    @else
    <p>Você ainda não está participando de nenhum evento</p>
    @endif
</div>


@endsection