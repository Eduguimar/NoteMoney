@extends('app')

@section('content')

    <div class="main container-fluid">

        <div class="row">

            @include('/partials/sidebar')

            <div class="col-sm-9">

                <div class="row">

                    <div class="jumbotron">

                        <h1>{{ $notebook->title }}</h1>
                        <hr/>
                        <p>{{ $notebook->description }}</p>

                        {!! Form::open() !!}

                        <a href="{{ route('notebooks.notes.create', $notebook) }}">{!! Form::button('Criar nota', ['class' => 'btn btn-primary btn-lg']) !!}</a>

                        {!! Form::close() !!}

                    </div>
                </div>

                <div class="row">

                    @if ( !$notebook->notes->count() )
                        Seu caderno ainda não possui notas!
                    @else
                        @foreach($notebook->notes as $note)
                            <div id="note" class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <a href="{{ route('notebooks.notes.show', $note) }}">{!! $note->title !!}</a>
                                    </h3>
                                </div>
                                <div id="note-description" class="panel-body">
                                    {!! $note->description !!}
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>

        </div>

    </div>
@endsection