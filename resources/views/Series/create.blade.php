<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}"  method="post">
        @csrf
    <div class="row mb-3">
        <div class="col-8">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}">
        </div>
        <div class="col-2"seasonsQnt
            <label for="seasonsQnt" class="form-label">N° Temporadas:</label>
            <input type="text" id="seasonsQnt" name="seasonsQnt" class="form-control" value="{{ old('seasonsQnt') }}">
        </div>
        <div class="col-2">
            <label for="episodesPerSeason" class="form-label">EPs/ Temporada:</label>
            <input type="text" id="episodesPerSeason" name="episodesPerSeason" class="form-control" value="{{ old('episodesPerSeason') }}">
        </div>
    </div>
        
    
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>