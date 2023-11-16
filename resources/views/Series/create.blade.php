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

    <div class="row my-2 d-flex">

        <div class="col-2 w-50 mt-3"  id="nomeAtor"> 
            <input type="text" id="inputAtor" name="nomeAtor[]" class="form-control" value="{{ old('nomeAtor') }}" placeholder="Nome do Ator">
        </div>

        <div class="mb-2 w-50 mt-3">
            <button onclick="add_cast()" id="addCast" class="me-4 btn btn-success text-light fs-6 d-flex justify-content-around align-self-center">
                <i class="fa fa-plus-circle me-1 mt-1" aria-hidden="true"></i> <span>+</span> </button>
        </div>
        
    </div> 
    
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

    <script>
        function add_cast() {
            event.preventDefault();
            const div = document.getElementById('nomeAtor');
            div.innerHTML += `<div class="nomeAtorAdd col-2 w-50 mt-3 d-flex" > 
                <input type="text" id="inputAtor" name="nomeAtor[]" class="form-control" value="{{ old('nomeAtor') }}" placeholder="Nome do Ator"><button onclick="removeCast()" 
                class="m-2 btn btn-danger">X</button>
            </div>`
        }
        

        function removeCast() {
            const divRemove = document.querySelector('.nomeAtorAdd');
            divRemove.remove();
        }
    </script>

</x-layout>