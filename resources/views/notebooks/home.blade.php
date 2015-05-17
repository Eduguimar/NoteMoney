@extends('app')

@section('content')

    <div class="main container-fluid">

        <div class="row">

            @if(isset($value))

                @include('/partials/sidebarsearch')

                <div class="col-sm-9">

                    <div class="row">

                        <div class="jumbotron">

                            @if(!isset($last_notebook))
                                <h2>Nenhum caderno encontrado!</h2>
                            @else

                                <h1>{{ $last_notebook->title }}</h1>

                                <div class="row">

                                    {!! Form::open(['route' => ['notebooks.destroy', $last_notebook], 'method' => 'DELETE']) !!}

                                    {!! Form::submit('Excluir Caderno', ['class' => 'btn btn-danger', 'style' => 'float: right']) !!}

                                    <a href="{{ route('notebooks.edit', $last_notebook) }}" style="float: right; margin-right: 20px;">{!! Form::button('Editar Caderno', ['class' => 'btn btn-warning']) !!}</a>

                                    {!! Form::close() !!}

                                </div>

                                <hr/>

                                <div class="row">

                                    <div class="col-md-8">

                                        <p>{{ $last_notebook->description }}</p>

                                    </div>

                                    <div style="float: right;">
                                        Criado em: {!! date('d/m/Y', strtotime($last_notebook->created_at)) !!}
                                        <br/>
                                        Última alteração: {!! date('d/m/Y', strtotime($last_notebook->updated_at)) !!}
                                    </div>

                                </div>


                                {!! Form::open() !!}

                                <a href="{{ route('notebooks.notes.create', $last_notebook) }}">{!! Form::button('Criar nota', ['class' => 'btn btn-primary btn-lg']) !!}</a>

                                {!! Form::close() !!}

                            @endif

                        </div>
                    </div>

                    <div class="row">

                        @if(!isset($last_notebook))
                            <h3></h3>

                            <hr/>
                        @else

                            @if ( !$last_notebook->notes->count() )
                                <h3>Você ainda não possui notas para esse caderno!</h3>
                            @else
                                @foreach($last_notebook->notes as $note)
                                    @if($note['color'] == 'gray')
                                        <div id="note" class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a href="{{ route('notebooks.notes.show', [$last_notebook, $note]) }}">{!! $note->title !!}</a>
                                                </h3>
                                            </div>
                                            <div class="panel-body note-description">
                                                {!! $note->description !!}
                                            </div>
                                        </div>
                                    @elseif($note['color'] == 'red')
                                        <div id="note" class="panel panel-danger">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a href="{{ route('notebooks.notes.show', [$last_notebook, $note]) }}">{!! $note->title !!}</a>
                                                </h3>
                                            </div>
                                            <div class="panel-body note-description">
                                                {!! $note->description !!}
                                            </div>
                                        </div>
                                    @elseif($note['color'] == 'yellow')
                                        <div id="note" class="panel panel-warning">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a href="{{ route('notebooks.notes.show', [$last_notebook, $note]) }}">{!! $note->title !!}</a>
                                                </h3>
                                            </div>
                                            <div class="panel-body note-description">
                                                {!! $note->description !!}
                                            </div>
                                        </div>
                                    @elseif($note['color'] == 'blue')
                                        <div id="note" class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a href="{{ route('notebooks.notes.show', [$last_notebook, $note]) }}">{!! $note->title !!}</a>
                                                </h3>
                                            </div>
                                            <div class="panel-body note-description">
                                                {!! $note->description !!}
                                            </div>
                                        </div>
                                    @elseif($note['color'] == 'green')
                                        <div id="note" class="panel panel-success">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a href="{{ route('notebooks.notes.show', [$last_notebook, $note]) }}">{!! $note->title !!}</a>
                                                </h3>
                                            </div>
                                            <div class="panel-body note-description">
                                                {!! $note->description !!}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                        @endif

                    </div>

                </div>

            @else

                @include('/partials/sidebar')

                <div class="col-sm-9">

                    <div class="row">

                        <div class="jumbotron">

                            @if( !$notebooks->count() || !isset($last_notebook))
                                <h2>Você ainda não possui cadernos!</h2>
                            @else

                                <h1>{{ $last_notebook->title }}</h1>

                                <div class="row">

                                    {!! Form::open(['route' => ['notebooks.destroy', $last_notebook], 'method' => 'DELETE']) !!}

                                    {!! Form::submit('Excluir Caderno', ['class' => 'btn btn-danger', 'style' => 'float: right']) !!}

                                    <a href="{{ route('notebooks.edit', $last_notebook) }}" style="float: right; margin-right: 20px;">{!! Form::button('Editar Caderno', ['class' => 'btn btn-warning']) !!}</a>

                                    {!! Form::close() !!}

                                </div>

                                <hr/>

                                <div class="row">

                                    <div class="col-md-8">

                                        <p>{{ $last_notebook->description }}</p>

                                    </div>

                                    <div style="float: right;">
                                        Criado em: {!! date('d/m/Y', strtotime($last_notebook->created_at)) !!}
                                        <br/>
                                        Última alteração: {!! date('d/m/Y', strtotime($last_notebook->updated_at)) !!}
                                    </div>

                                </div>


                                {!! Form::open() !!}

                                    <a href="{{ route('notebooks.notes.create', $last_notebook) }}">{!! Form::button('Criar nota', ['class' => 'btn btn-primary btn-lg']) !!}</a>

                                {!! Form::close() !!}

                            @endif

                        </div>
                    </div>

                    <div class="row">

                        @if( !$notebooks->count() || !isset($last_notebook))
                            <h3>É preciso criar um caderno para criar as notas!</h3>

                            <hr/>

                            {!! Form::open() !!}

                            <a href="#">{!! Form::button('Criar primeiro caderno!', ['class' => 'btn btn-primary btn-lg', 'data-toggle' => 'modal', 'data-target' => '#createNotebook']) !!}</a>

                            {!! Form::close() !!}
                        @else

                            @if ( !$last_notebook->notes->count() )
                                <h3>Você ainda não possui notas para esse caderno!</h3>
                            @else
                                @foreach($last_notebook->notes as $note)
                                    @if($note['color'] == 'gray')
                                        <div id="note" class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a href="{{ route('notebooks.notes.show', [$last_notebook, $note]) }}">{!! $note->title !!}</a>
                                                </h3>
                                            </div>
                                            <div class="panel-body note-description">
                                                {!! $note->description !!}
                                            </div>
                                        </div>
                                    @elseif($note['color'] == 'red')
                                        <div id="note" class="panel panel-danger">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a href="{{ route('notebooks.notes.show', [$last_notebook, $note]) }}">{!! $note->title !!}</a>
                                                </h3>
                                            </div>
                                            <div class="panel-body note-description">
                                                {!! $note->description !!}
                                            </div>
                                        </div>
                                    @elseif($note['color'] == 'yellow')
                                        <div id="note" class="panel panel-warning">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a href="{{ route('notebooks.notes.show', [$last_notebook, $note]) }}">{!! $note->title !!}</a>
                                                </h3>
                                            </div>
                                            <div class="panel-body note-description">
                                                {!! $note->description !!}
                                            </div>
                                        </div>
                                    @elseif($note['color'] == 'blue')
                                        <div id="note" class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a href="{{ route('notebooks.notes.show', [$last_notebook, $note]) }}">{!! $note->title !!}</a>
                                                </h3>
                                            </div>
                                            <div class="panel-body note-description">
                                                {!! $note->description !!}
                                            </div>
                                        </div>
                                    @elseif($note['color'] == 'green')
                                        <div id="note" class="panel panel-success">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a href="{{ route('notebooks.notes.show', [$last_notebook, $note]) }}">{!! $note->title !!}</a>
                                                </h3>
                                            </div>
                                            <div class="panel-body note-description">
                                                {!! $note->description !!}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                        @endif

                    </div>

                </div>

            @endif

        </div>

    </div>

@stop