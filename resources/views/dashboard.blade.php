@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Seus eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Editar / Excluir</th>
            </tr>
        </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <th scropt="row">{{$loop->index + 1 }}</th>
            <td> <a id="dashboard-title" href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
            <td> {{ count($event->users) }}</td>
            <td> 
                <!-- Button trigger modal -->
                <a href="/events/edit/{{$event->id}}" id="edit-button" class="btn btn-info edit-btn" data-toggle="modal" data-target="#exampleModal{{$event->id}}"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/events/{{ $event->id }}" method="POST" class="d-inline">
                    @csrf    
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    @else
    <p>Você ainda não tem eventos, <a href="/events/create">Criar evento?</a></p>
    @endif
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que você está participando: </h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($eventasparticipant) > 0)
        <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Sair do Evento</th>
            </tr>
        </thead>
    <tbody>
        @foreach($eventasparticipant as $event)
        <tr>
            <th scropt="row">{{$loop->index + 1 }}</th>
            <td> <a id="dashboard-title" href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
            <td> {{ count($event->users) }}</td>
            <td> 
                <form action="/events/leave/{{ $event->id }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" id="leave-button" class="btn btn-danger delete-btn"><ion-icon name="exit-outline"></ion-icon></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    @endif
</div>

@endsection

