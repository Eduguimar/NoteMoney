@extends('app')

@section('content')

    <div class="main container-fluid">

        <div class="row">

            @include('/partials/sidebar')

            <div class="col-sm-9">

                <h2>Nova Nota</h2>

                <hr>

                {!! Form::open(['route' => ['notebooks.notes.store', $notebook]]) !!}

                    <div class="form-group">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
                    </div>

                    <div class="row cores-notas">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cor da Nota</h3>
                            </div>
                            <div class="panel-body">
                                <label class="radio-inline cores-nota"><input type="radio" name="color" value="gray" checked>Cinza</label>
                                <label class="radio-inline cores-nota"><input type="radio" name="color" value="red">Vermelho</label>
                                <label class="radio-inline cores-nota"><input type="radio" name="color" value="yellow">Amarelo</label>
                                <label class="radio-inline cores-nota"><input type="radio" name="color" value="blue">Azul</label>
                                <label class="radio-inline cores-nota"><input type="radio" name="color" value="green">Verde</label>
                            </div>
                        </div>

                        <!--<div class="col-md-3">
                            {!! Form::label('color', 'Cinza', ['class' => 'radio-inline']) !!}
                            {!! Form::radio('color', 'gray', true, ['class' => 'radio']) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label('color', 'Vermelho') !!}
                            {!! Form::radio('color', 'red', null, ['class' => 'radio']) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label('color', 'Verde') !!}
                            {!! Form::radio('color', 'green', null, ['class' => 'radio']) !!}
                        </div>
                        <div class="col-md-2">
                            {!! Form::label('color', 'Azul') !!}
                            {!! Form::radio('color', 'blue', null, ['class' => 'radio']) !!}
                        </div>
                        <div class="col-md-1">
                            {!! Form::label('color', 'Amarelo') !!}
                            {!! Form::radio('color', 'yellow', null, ['class' => 'radio']) !!}
                        </div>-->

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

            </div>
        </div>
    </div>

@endsection