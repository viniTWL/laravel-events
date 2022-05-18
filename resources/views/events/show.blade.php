@extends('layouts.main')

@section('title', $event->title)

@section('content')

    <div id="container" class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img id="image-show" class="image-fluid" src="/img/eventsImgs/{{ $event->image }}" alt="{{ $event->title }}">
            </div>
         <div id="info-container"class="col-md-6">
             <h1>{{ $event->title }}</h1>
             <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->city }}</p>
             <p class="event-particpants"><ion-icon name="people-outline"></ion-icon> {{ count($event->users) }} {{ count($event->users) <= 1 ? 'participante' : 'participantes'}} </p>
             <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $event_owner['name']}}</p> <!--- Pego o dado 'name' assim pois é um array --->
             @if(!$hasUserJoined)
                <form action="/events/join/{{ $event->id }}" method="POST">
             @csrf
             <a href="/events/join/{{ $event->id }}" class="btn btn-primary" id="event-submit" onclick="event.preventDefault();this.closest('form').submit();">Confirmar presença</a>
             </form>
             @else
             <p class="already-joined-msg">Você já está participando desse evento!</p>
             @endif
         </div>
         
         <div class="col-md-12" id="description-container">
             <h2>Sobre o evento:</h2>
                <p class="event-description">{{ $event->description }}</p>
                <ul class="items-list" id="items-list">
                    @foreach ($event->items as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
         </div>
        </div>
    </div>

@endsection