@extends('app')

@section('content')

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

    <a href="notes/create">{!! Form::button('Criar nota', ['class' => 'btn btn-primary']) !!}</a>

    {!! Form::close() !!}

@endsection