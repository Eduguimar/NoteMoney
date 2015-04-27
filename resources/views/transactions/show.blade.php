@extends('app')

@section('content')

    <div class="main container-fluid">

        <div class="row">

            <div class="col-sm-10 col-sm-offset-1">

                <div class="jumbotron">

                    <h1>{!! $transaction->title !!}</h1>

                    <div class="row">

                        {!! Form::open(['route' => ['transactions.destroy', $transaction], 'method' => 'DELETE']) !!}

                            {!! Form::submit('Excluir Lançamento', ['class' => 'btn btn-danger confirm-delete', 'style' => 'float: right', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Excluir Lançamento', 'data-message' => 'Deseja realmente excluir este lançamento?']) !!}

                            <a href="{{ route('transactions.edit', $transaction) }}" style="float: right; margin-right: 20px;">{!! Form::button('Editar Lançamento', ['class' => 'btn btn-warning']) !!}</a>

                        {!! Form::close() !!}

                    </div>

                    <hr/>

                    <p>{!! $transaction->description !!}</p>

                    @if($transaction['type'] == 'income')
                        <p>Receita</p>
                    @else
                        <p>Despesa</p>
                    @endif

                    <p>Criado em: {!! date('d/m/Y', strtotime($transaction->created_at)) !!}</p>

                    <p>Última modificação em: {!! date('d/m/Y', strtotime($transaction->updated_at)) !!}</p>

                    <p>R$ {!! number_format($transaction['amount'], 2, ',', '.') !!}</p>

                    {!! Form::open() !!}

                        <a href="{{ route('transactions.index') }}">{!! Form::button('Voltar', ['class' => 'btn btn-default btn-lg']) !!}</a>

                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>

    @include('/modals/confirm_delete')

@endsection