@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1 id="create-event-title">Crie o seu evento!</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        <!--- Aqui estou passando o token para o formulário --->
        @csrf
        <div class="form-group">
            <label for="date">Data do Evento:</label>
            <input type="date" id="date" name="date" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Banner do evento:</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título do Evento">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Descrição do Evento">
        </div>
        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade">
        </div>
        <div class="form-group">
            <label for="items">Adicione itens de infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox"  id="items" name="items[]" value="cadeiras">
                Cadeiras
                </input>
            </div>
            <div class="form-group">
                <input type="checkbox"  id="items" name="items[]" value="palco">
                Palco	
                </input>
            </div>
            <div class="form-group">
                <input type="checkbox"  id="items" name="items[]" value="open bar">
                Open Bar
                </input>
            </div>
            <div class="form-group">
                <input type="checkbox"  id="items" name="items[]" value="open food">
                Open Food
                </input>
            </div>

        </div>
        <div class="form-group">
            <label for="private">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
        </div>
        <input id="create-button"type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
    </div>
@endsection