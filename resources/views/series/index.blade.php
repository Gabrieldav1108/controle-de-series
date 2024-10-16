<x-layout title="Series" :mensagem-sucesso="$mensagemSucesso">
    @auth
        <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar nova serie</a>
    @endauth

    {{-- fazendo a verificação se existe a mensagem de sucesso, se existir, ira exibir --}}

    <ul class="list-group">
        @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between aling-items-center">
           @auth
            <a href="{{ route('seasons.index', $serie->id) }}">{{ $serie->nome }}</a>
           @endauth 
               
            {{-- passando o id como parametro --}}

        @auth
            <span class="d-flex">

                <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">
                    E
                </a>

                <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                    @csrf
                    {{-- laravel envia outro campo informando q é pra ele tratar como se fosse uma rota no delete --}}
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>
                </form>

            </span>
        @endauth
        </li>
        @endforeach 
    </ul>
</x-layout>