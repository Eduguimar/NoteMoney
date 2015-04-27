@extends('app')

@section('content')

    <div class="main container-fluid">

        <div class="row">

            @include('/partials/sidebar')

            <div class="col-sm-9">

                <div class="row">

                    <div class="jumbotron">

                        <ol class="breadcrumb">
                            <li><a href="#">{!! $notebook->title !!}</a></li>
                            <li class="active">{!! $note->title !!}</li>
                        </ol>



                        <h1>{!! $note->title !!}</h1>

                        <div class="row">

                            {!! Form::open(['route' => ['notebooks.notes.destroy', $notebook, $note], 'method' => 'DELETE']) !!}

                            {!! Form::submit('Excluir Nota', ['class' => 'btn btn-danger confirm-delete', 'style' => 'float: right', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Excluir Nota', 'data-message' => 'Deseja realmente excluir esta nota?']) !!}

                            <a href="{{ route('notebooks.notes.edit', [$notebook, $note]) }}" style="float: right; margin-right: 20px;">{!! Form::button('Editar Nota', ['class' => 'btn btn-warning']) !!}</a>

                            {!! Form::close() !!}

                        </div>

                        <hr/>

                        <p>{!! nl2br($note->description) !!}</p>

                        {!! Form::open() !!}

                        <a href="{{ route('notebooks.show', $notebook) }}">{!! Form::button('Voltar', ['class' => 'btn btn-default btn-lg']) !!}</a>

                        {!! Form::close() !!}

                    </div>
                </div>

            </div>

        </div>

    </div>

    @include('/modals/confirm_delete')

@endsection