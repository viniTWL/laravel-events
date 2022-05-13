@extends ('layouts.main');

@section ('title', $event->title)

@section ('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/eventsImgs/{{ $event->image }}" alt="{{ $event->title }}">
            </div>
         <div id="info-container"class="col-md-6">
             <h1>{{ $event->title }}</h1>
             <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->city }}</p>
             <p class="event-particpants"><ion-icon name="people-outline"></ion-icon> X Particantes</p>
             <p class="event-owner"><ion-icon name="start-outline"></ion-icon>event_owner</p> 
             <a href="#" class="btn btn-primary" id="event-submit">Confirmar presença</a>
         </div>
         
         <div class="col-md-12" id="description-container">
             <h3>Descrição</h3>
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