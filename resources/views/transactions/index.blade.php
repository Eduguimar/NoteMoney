@extends('app')

@section('content')

    <div class="main container-fluid">

        <div class="row">

            <div class="col-sm-10 col-sm-offset-1">

                @if ( !$transactions->count() )
                    <div class="jumbotron">
                        <h2>Você ainda não possui lançamentos!</h2>
                    </div>
                @else
                    <h1 class="page-heading">Lançamentos</h1>

                    <h2>Total = R$ {!! $totalAmount !!}</h2>

                    <table id="transaction-table" class="table">
                        <tr>
                            <th>Data</th>
                            <th>Lançamento</th>
                            <th>Valor</th>
                            <th>Editar</th>
                        </tr>
                        @foreach( $transactions as $transaction )
                            @if($transaction['type'] == 'income')
                                <tr class="success">
                                    <td><a href="{{ route('transactions.show', $transaction) }}" class="receita">{!! date('d-m-Y', strtotime($transaction->created_at)) !!}</a></td>
                                    <td><a href="{{ route('transactions.show', $transaction) }}" class="receita">{!! $transaction->title !!}</a></td>
                                    <td class="receita">{!! $transaction->amount !!}</td>
                                    <td style="text-align: center;"><a href="{{ route('transactions.edit', $transaction) }}" style="color: #444;">{!! Form::button('<i class="fa fa-pencil-square-o"></i>') !!}</a></td>
                                </tr>
                            @else
                                <tr class="danger despesa">
                                    <td><a href="{{ route('transactions.show', $transaction) }}" class="despesa">{!! date('d-m-Y', strtotime($transaction->created_at)) !!}</a></td>
                                    <td><a href="{{ route('transactions.show', $transaction) }}" class="despesa">{!! $transaction->title !!}</a></td>
                                    <td class="despesa">{!! $transaction->amount !!}</td>
                                    <td style="text-align: center;"><a href="{{ route('transactions.edit', $transaction) }}" style="color: #444;">{!! Form::button('<i class="fa fa-pencil-square-o"></i>') !!}</a></td>
                                </tr>
                            @endif
                        @endforeach
                    </table>

                    <div style="float: right;">
                        {!! Form::open(['url' => 'transactions', 'method' => 'GET']) !!}

                            {!! Form::label('data_inicio', 'De: ') !!}
                            {!! Form::input('text', 'data_inicio', null, ['class' => 'datepicker']) !!}

                            {!! Form::label('data_fim', 'Até: ') !!}
                            {!! Form::input('text', 'data_fim', null, ['class' => 'datepicker']) !!}

                            {!! Form::submit('Pesquisar', ['class' => 'btn btn-info']) !!}

                        {!! Form::close() !!}

                        <a href="/transactions" class="btn btn-info" style="float: right;">Todos Lançamentos</a>
                    </div>

                @endif

                <h3>
                    {!! link_to_route('transactions.create', 'Criar Novo Lançamento') !!}
                </h3>

            </div>
        </div>
    </div>

    @include('/modals/confirm_delete')

@endsection
