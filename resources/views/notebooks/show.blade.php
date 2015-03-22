@extends('app')

@section('content')
    <h1>{{ $notebook->title }}</h1>
    <h2>{{ $notebook->description }}</h2>

    @if ( !$notebook->notes->count() )
        Seu caderno ainda não possui notas!
    @else
        @foreach($notebook->notes as $note)
            <h1>{!! $note->title !!}</h1>
            <h2>{!! $note->description !!}</h2>
            <hr>
        @endforeach
    @endif

    {!! Form::open() !!}

    <a href="{{ route('notebooks.notes.create', $notebook) }}">{!! Form::button('Criar nota', ['class' => 'btn btn-primary']) !!}</a>

    {!! Form::close() !!}

@endsection