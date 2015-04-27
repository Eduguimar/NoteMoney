@extends('app')

@section('content')

    <div class="main container-fluid">

        <div class="row">

            @include('/partials/sidebar')

            <div class="col-sm-9">

                <h2>Editar nota</h2>

                <hr>

                {!! Form::model($note, ['method' => 'PUT', 'route' => ['notebooks.notes.update', $notebook, $note]]) !!}

                <div class="form-group">
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título']) !!}
                </div>

                <div class="form-group">
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
                </div>
                <div class="form-inline">
                    <div class="form-group">
                        <a href="{{ route('notebooks.notes.show', [$notebook, $note]) }}">
                            {!! Form::button('Cancelar', ['class' => 'btn btn-default']) !!}
                        </a>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection