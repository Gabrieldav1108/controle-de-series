<x-layout title="Editar Série '{!! $series->nome !!}'">
    {{-- <x-series.form :action="route('series.update', $series->id)" :nome="$series->nome" :update="true"/> --}}

        <form action="{{ route('series.update', $series->id)}}" method="post">
            @csrf
        
            {{-- @if($update)
            @method('PUT')
            @endif --}}
            <div class="row mb-3">

                <div class="col-8">
                    <label for="nome" class="form-label">Nome:</label>
                    <input 
                    autofocus
                    type="text" 
                    name="nome" 
                    class="form-control" 
                    value="{{ $series->nome }}">
                </div>
                <div class="col-2">
                    <label for="seasonsQty" class="form-label">Temporadas:</label>
                    <input 
                    type="text" 
                    name="seasonsQty" 
                    class="form-control" 
                    >
                </div>
                <div class="col-2">
                    <label for="episodesPerSeason" class="form-label">Episódios:</label>
                    <input 
                    type="text" 
                    name="episodesPerSeason" 
                    class="form-control" 
                    >
                </div>
    
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
</x-layout>