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
                    {!! Form::textarea('description', null, ['class' => 'form-control counter', 'style' => 'max-height: 130px; ']) !!}
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tipo do lançamento</h3>
                    </div>
                    <div class="panel-body">
                        <label class="radio-inline cores-nota"><input type="radio" name="type" value="income" checked>Receita</label>
                        <label class="radio-inline cores-nota"><input type="radio" name="type" value="expense">Despesa</label>
                    </div>
                </div>

                <div class="form-group well" style="width: 25%">
                    {!! Form::label('amount', 'Valor: ', ['style' => 'font-size: large;']) !!}
                    {!! Form::text('amount', null, ['id' => 'amount', 'style' => 'width: 95%;']) !!}
                </div>

                <div class="form-inline" style="margin: 40px 0">
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