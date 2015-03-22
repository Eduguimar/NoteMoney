@extends('app')

@section('content')

    {!! Form::open(['route' => ['notebooks.notes.store', $notebook]]) !!}

        <div class="form-group">
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título']) !!}
        </div>

        <div class="form-group">
            {!! Form::textarea('description', null, ['class' => 'ckeditor', 'placeholder' => 'Descrição']) !!}
        </div>
        <div class="form-inline">
            <div class="form-group">
                <a href="{{ route('notebooks.show', $notebook) }}">
                    {!! Form::button('Cancelar', ['class' => 'btn btn-default']) !!}
                </a>
            </div>
            <div class="form-group">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

    {!! Form::close() !!}

@endsection