@component('mail::message')

    # {{ $nomeSerie }} criada
    
    A série {{ $nomeSerie }} com {{ $episodiosPorTemporada }} e {{ $qntSeasons }} por temporada foi criada.
    
    Veja aqui

    @component('mail::button', ['url' => route('seasons.index', $id)])
        Ver serie
    @endcomponent

@endcomponent
