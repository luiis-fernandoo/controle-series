<x-layout title="Episódios"> 

    <form method="post">
        @csrf
        <ul class="list-group"> 
            @foreach($episodes as $episode)
                <li class="list-group-item d-flex align-items-center justify-content-between"> 
                        
                    Episódio {{ $episode->number }}    

                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}"
                    @if($episode->watched) checked @endif"/>
                </li>

            @endforeach

        </ul>
        <button type="submit" class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
</x-layout>