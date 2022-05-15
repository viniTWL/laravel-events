@extends('layouts.main') 

@section('title', 'Vini Events')

@section('content')

<div id="search-container" class="col-md-12">
    <h1> Busque um evento </h1>
    <form id="form-search"action="/" method="get">
        <input id="search-input"class="form-control" type="text" name="search" id="search" placeholder="Procurar">
    </form>
</div>
<div class="container">
<h1> Próximos eventos </h1>
        <p>Veja os eventos dos próximos dias</p>
    <div id="events-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3" style="width: 18rem;">
            <img class="card-img" src="/img/eventsImgs/{{ $event->image }}" alt="{{ $event->title }}">
            <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
            <p class="card-title">{{ $event->title }}</p>
            <a id="card-button" href='/events/{{ $event->id }}' class="btn btn-primary">Saiba mais</a>
        </div>
        @endforeach
    </div>
</div>
@if(count($events) == 0)
    <p> Não há eventos dísponiveis </p>
@endif
@endsection