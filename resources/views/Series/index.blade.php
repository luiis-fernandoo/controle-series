<x-layout title="Series"> 

    @isset($mensagem)
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endisset

    @auth
    <a href="{{route('series.create')}}"><button class="btn btn-dark mb-1">Adicionar</button></a>
    @endauth


    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item d-flex align-items-center justify-content-between"> 
                @auth<a href="{{route('seasons.index', $serie->id)}}">@endauth
                    {{ $serie->nome }} 
                @auth</a>@endauth
            
            @auth
                <span class="d-flex">
                    <a href="{{route('series.edit', $serie->id)}}"><button class="btn btn-warning btn-sm mx-2">E</button></a>

                    <form action="{{route('series.destroy', $serie->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">X</button>
                    </form>
                </span>
            @endauth
            </li>
            
        @endforeach
    </ul>
    
</x-layout>