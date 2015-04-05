@extends('app')

@section('content')

    <h1 class="page-heading">Novo Lançamento</h1>

    {!! Form::model(new App\Transaction, ['route' => ['transactions.store']]) !!}

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
        {!! Form::label('amount', 'Valor: ') !!}
        {!! Form::text('amount', null, ['id' => 'amount']) !!}
    </div>

    <div class="form-inline">
        <div class="form-group">
            {!! Form::submit('Gravar!', ['class' => 'btn btn-primary']) !!}
        </div>
        <div class="form-group">
            <a href="{{ URL::previous() }}">
                {!! Form::button('Cancel', ['class' => 'btn btn-warning']) !!}
            </a>
        </div>
    </div>

    {!! Form::close() !!}

@endsection