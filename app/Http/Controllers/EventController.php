<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index() {
        
            $search = request('search');

            if($search) {
                $events = Event::where([
                    ['title', 'like', '%'.$search.'%']
                ])->get(); // objeto events é uma busca where, onde o campo title tem que ser similar ao que foi digitado no input de busca
            } 
            else{
                $events = Event::all(); // chamando todos os registros da tabela events e mostra como cards
            }
            
            return view('welcome', ['events' => $events, 'search' => $search]); 
        }

    public function create() {
        return view ('events.create');
    }

    public function createEvent(Request $request) { // Request é o objeto que recebe os dados do formulário

            $event = new Event; // cria um novo objeto de evento
            //pega os dados do formulário e atribui ao objeto
            $event->title = $request->title;
            $event->description = $request->description;
            $event->city = $request->city;
            $event->private = $request->private;
            if($request->hasFile('image') && $request->file('image')->isValid()) { // verifica se o arquivo existe e se é válido
                $requestImage = $request->image; // pega o arquivo
                $extension = $requestImage->extension(); // pega a extensão do arquivo, ex: jpg
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension; // salva no path
                $requestImage->move(public_path('img/eventsImgs'), $imageName); // coloca o arquvio na pasta public/images
                $event->image = $imageName;
            }
            else{
                $event->image = "default.jpg";
            }
            $event->items = $request->items;
            $event->date = $request->date;
            
            //$user = auth()->user(); // pega o usuário logado
            //$event->user_id = $user->id; // atribui o id do usuário logado ao objeto evento
            
            $event->save(); // salva no banco de dados
            return redirect('/')->with('msg', 'O evento foi criado com sucesso!');
    
    }

    public function show($id){
        
        $event = Event::findOrFail($id); // busca o evento pelo id

        return view('events.show', ['event' => $event]); // retorna a view events.show com o evento	
    }

};
