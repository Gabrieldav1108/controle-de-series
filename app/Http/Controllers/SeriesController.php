<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Autenticador;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;


class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $repository){
        
    }
    
    public function index(Request $request){
        //pega todas as temporadas de uma serie
        $series = Series::all();
        $series = Series::query()->orderBy('nome', 'asc')->get();
        //resgatando o item da sessao, "mensagem.sucesso", se nao existir, vai retornar um null
        $mensagemDeSucesso = session('mensagem.sucesso');
        //chama a view, e cria o nome da variavel utilizada nela, passando os valores desejados
        return view('series.index')
        ->with('series', $series)
        ->with('mensagemSucesso', $mensagemDeSucesso);
    }

    public function create(){
        return view('series.create');
    }

    public function store (SeriesFormRequest $request){
        //espera algumas validações, caso nao sejam cumpridas, o usuario sera redirecionado para a ultima url acessada
        // $request->validate([
        //     'nome' => ['required', 'min:3']
        // ]);

        $serie = $this->repository->add($request);
        
        //criando uma resposta de redirecionamento encaminhando pra rota desejada
        return to_route('series.index')
        ->with('mensagem.sucesso' , "Série '{$serie->nome}' adicionada com sucesso!!");
    }

    //Serie $series ja informa qual o id da serie
    public function destroy(Series $series){
        $series->delete();
        //inserindo um dado na sessao, que so dura um request
        //session()->flash('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso!!");
        //with faz o redirecionamento com dados da flash
        return to_route('series.index')
        ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso!!");
    }

    public function edit(Series $series){
        //chama como propriedade para que retorne o valor, 
        //se chamar como função ira retornar a configuração do relacionamento, entretanto, pelo metodo é possivel manipular a query
        //dd($series->seasons);
        return view('series.edit')
        ->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request){
        $series->fill($request->all());
        
        $series->save();
        
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }

}
