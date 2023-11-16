<x-layout title="Editar Série {!! $series->nome !!}">
    <x-Series.form :action="route('series.update', $series->id)" :nome="$series->nome" :update="true"/>
</x-layout>