<x-layout title="Temporadas"> 

    <ul class="list-group">
        @foreach($seasons as $season)
            <li class="list-group-item d-flex align-items-center justify-content-between"> 
                <a href="{{route('episodes.index', $season->id)}}">
                    Temporada {{ $season->number }} 
                </a>   

                <span class="badge bg-secondary">
                    {{ $season->numberOfWatchedEpisodes() }} / {{$season->episodes->count()}}
                </span>
            </li>

            
        @endforeach
    </ul>
    
</x-layout>