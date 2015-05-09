@extends('app')

@section('content')

    <div class="main container-fluid">

        <div class="row">

            <div class="col-sm-10 col-sm-offset-1">

                <h1 class="page-heading">Editar Lançamento</h1>

                {!! Form::model($transaction, ['method' => 'PUT', 'route' => ['transactions.update', $transaction]]) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Título: ') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Descrição: ') !!}
                    {!! Form::textarea('description', null, ['class' => 'ckeditor']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('type', 'Receita') !!}
                    {!! Form::radio('type', 'income', true, ['class' => 'radio']) !!}
                    <br>
                    {!! Form::label('type', 'Despesa') !!}
                    {!! Form::radio('type', 'expense', null, ['class' => 'radio']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('amount', 'Valor ') !!}
                    {!! Form::text('amount', null, ['id' => 'amount']) !!}
                </div>

                <div class="form-inline">
                    <div class="form-group">
                        <a href="{{ route('transactions.index', $transaction) }}">
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