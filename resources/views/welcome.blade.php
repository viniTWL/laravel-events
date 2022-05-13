@extends('layouts.main') 

@section('title', 'Vini Events')

@section('content')

<div id="search-container" class="col-md-12">
    <h1> Busque um evento </h1>
    <form action="/" method="get">
        <input class="form-control" type="text" name="search" id="search" placeholder="Procurar">
    </form>
</div>

    @foreach($events as $event)
    <div class="card" style="width: 18rem;">
        <p>{{ $event->title }} -- {{ $event->description }} </p>
        <img class="card-img" src="/img/eventsImgs/{{ $event->image }}" alt="{{ $event->title }}">
        <a href='/events/{{ $event->id }}' class="btn btn-primary">Saiba mais</a>
        <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
    </div>
    @endforeach

@if(count($events) == 0)
    <p> Não há eventos dísponiveis </p>
@endif
@endsection