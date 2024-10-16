<x-layout title="Nova Serie">

    {{-- old -> pega da flash session a requisição anterior --}}

    <form action="{{ route('series.store') }}" method="post">
        @csrf
        
        <div class="row mb-3">

            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input 
                autofocus
                type="text" 
                name="nome" 
                class="form-control" 
                value="{{ old('nome') }}">
            </div>
            <div class="col-2">
                <label for="seasonsQty" class="form-label">Temporadas:</label>
                <input 
                type="text" 
                name="seasonsQty" 
                class="form-control" 
                value="{{ old('seasonsQty') }}">
            </div>
            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Episódios p/ <table></table>emporada:</label>
                <input 
                type="text" 
                name="episodesPerSeason" 
                class="form-control" 
                value="{{ old('episodesPerSeason') }}">
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

</x-layout>