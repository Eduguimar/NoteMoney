@extends('app')

@section('content')

    <div class="main container-fluid">

        <div class="row">

            @include('/partials/sidebar')

            <div class="col-sm-9">

                <div class="row">

                    <div class="jumbotron">

                        <h1>{{ $notebook->title }}</h1>

                        <div class="row">

                            {!! Form::open(['route' => ['notebooks.destroy', $notebook], 'method' => 'DELETE']) !!}

                                {!! Form::submit('Excluir Caderno', ['class' => 'btn btn-danger confirm-delete', 'style' => 'float: right', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Excluir Caderno', 'data-message' => 'Deseja realmente excluir este caderno?']) !!}

                                <a href="{{ route('notebooks.edit', $notebook) }}" style="float: right; margin-right: 20px;">{!! Form::button('Editar Caderno', ['class' => 'btn btn-warning']) !!}</a>

                            {!! Form::close() !!}

                        </div>
                        
                        <hr/>

                        <div class="row">

                            <div class="col-md-8">

                                <p>{{ $notebook->description }}</p>

                            </div>

                            <div style="float: right;">
                                Criado em: {!! date('d/m/Y', strtotime($notebook->created_at)) !!}
                                <br/>
                                Última alteração: {!! date('d/m/Y', strtotime($notebook->updated_at)) !!}
                            </div>

                        </div>



                        {!! Form::open() !!}

                            <a href="{{ route('notebooks.notes.create', $notebook) }}">{!! Form::button('Criar nota', ['class' => 'btn btn-primary btn-lg']) !!}</a>

                        {!! Form::close() !!}

                    </div>
                </div>

                <div class="row">

                @if ( !$notebook->notes->count() )
                    <h3>Você ainda não possui notas para esse caderno!</h3>
                @else
                    @foreach($notebook->notes as $note)
                        @if($note['color'] == 'gray')
                            <div id="note" class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <a href="{{ route('notebooks.notes.show', [$notebook, $note]) }}">{!! $note->title !!}</a>
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
                                        <a href="{{ route('notebooks.notes.show', [$notebook, $note]) }}">{!! $note->title !!}</a>
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
                                        <a href="{{ route('notebooks.notes.show', [$notebook, $note]) }}">{!! $note->title !!}</a>
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
                                        <a href="{{ route('notebooks.notes.show', [$notebook, $note]) }}">{!! $note->title !!}</a>
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
                                        <a href="{{ route('notebooks.notes.show', [$notebook, $note]) }}">{!! $note->title !!}</a>
                                    </h3>
                                </div>
                                <div class="panel-body note-description">
                                    {!! $note->description !!}
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif

                </div>

            </div>

        </div>

    </div>

    @include('/modals/confirm_delete')

@endsection