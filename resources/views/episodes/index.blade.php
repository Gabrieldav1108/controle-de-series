<x-layout title="Episódios" :mensagem-sucesso="$mensagemSucesso">
    <a href="{{ route('series.index') }}" class="btn btn-dark mb-2">Lista de Séries</a>

    <form method="post" >
        @csrf
        <ul class="list-group">
            @foreach ( $episodes as $episode )
                <li class="list-group-item d-flex justify-content-between aling-items-center">
                    Episódio {{$episode->number}}

                        <input type="checkbox" name="episodes[]" 
                        value="{{ $episode->id }}" 
                        @if ($episode->watched)
                            checked
                        @endif
                        >         
                </li>   
            @endforeach
        </ul>

        <button class="btn btn-primary mt-2 mb-2">
            Salvar
        </button>
    </form>
</x-layout>