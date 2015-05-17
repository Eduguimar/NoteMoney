@extends('app')

@section('content')

    <div class="main container-fluid">

        <div class="row">

            @include('/partials/sidebar')

            <div class="col-sm-9">

                <div class="row">

                    <div class="jumbotron">

                        {!! Form::open(['action' => 'NotesController@search', 'method' => 'GET']) !!}

                            <button type="submit" style="height: 33px; width: 33px; float: right;"><i class="fa fa-search"></i></button>

                            {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Procurar notas', 'style' => 'width: 400px; float: right;']) !!}

                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <br/>

                        <a href="/notes">{!! Form::button('Todas as Notas', ['class' => 'btn btn-default', 'style' => 'float: right;']) !!}</a>


                        <h1>Suas notas</h1>

                        <hr/>


                        <div class="row">

                            @foreach($notes as $note_array)
                                @foreach($note_array as $note)

                                    @foreach($notebooks as $notebook)
                                        @if($note['notebook_id'] == $notebook['id'])
                                            @if($note['color'] == 'gray')
                                                <div id="note_display" class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">
                                                            <a href="{{ route('notebooks.notes.show', [$notebook, $note]) }}">{!! $note->title !!}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        {!! $note->description !!}
                                                    </div>
                                                </div>
                                            @elseif($note['color'] == 'red')
                                                <div id="note_display" class="panel panel-danger">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">
                                                            <a href="{{ route('notebooks.notes.show', [$notebook, $note]) }}">{!! $note->title !!}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        {!! $note->description !!}
                                                    </div>
                                                </div>
                                            @elseif($note['color'] == 'yellow')
                                                <div id="note_display" class="panel panel-warning">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">
                                                            <a href="{{ route('notebooks.notes.show', [$notebook, $note]) }}">{!! $note->title !!}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        {!! $note->description !!}
                                                    </div>
                                                </div>
                                            @elseif($note['color'] == 'blue')
                                                <div id="note_display" class="panel panel-info">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">
                                                            <a href="{{ route('notebooks.notes.show', [$notebook, $note]) }}">{!! $note->title !!}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        {!! $note->description !!}
                                                    </div>
                                                </div>
                                            @elseif($note['color'] == 'green')
                                                <div id="note_display" class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">
                                                            <a href="{{ route('notebooks.notes.show', [$notebook, $note]) }}">{!! $note->title !!}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        {!! $note->description !!}
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                            @endforeach

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

@stop