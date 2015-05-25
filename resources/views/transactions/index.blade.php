@extends('app')

@section('content')

    <div class="main container-fluid">

        <div class="row">

            <div class="col-sm-10 col-sm-offset-1">

                @if ( !$transactions->count() && $dater == false)
                    <div class="jumbotron">
                        <h2>Você ainda não possui lançamentos!</h2>

                        <br/>
                        <br/>

                        <a href="{{ route('transactions.create') }}">{!! Form::button('Criar Primeiro Lançamento', ['class' => 'btn btn-primary btn-lg']) !!}</a>

                    </div>
                @else
                    <h1 class="page-heading">Lançamentos Financeiros</h1>

                    <a href="{{ route('transactions.create') }}" style="float: right;">{!! Form::button('Criar Novo Lançamento', ['class' => 'btn btn-primary btn-lg']) !!}</a>

                    @if($totalAmount >= 0)

                        <h2 class="well" style="width: 50%">Saldo Total: <span style="color: #138921;">R$ {!! $totalAmount !!}</span></h2>

                    @else

                        <h2 class="well" style="width: 50%">Saldo Total: <span style="color: #C30707;">R$ {!! $totalAmount !!}</span></h2>

                    @endif

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
                        @if($dater == false)
                            {!! Form::open(['url' => 'transactions', 'method' => 'GET']) !!}

                                {!! Form::label('data_inicio', 'De: ') !!}
                                {!! Form::input('text', 'data_inicio', null, ['class' => 'datepicker']) !!}

                                {!! Form::label('data_fim', 'Até: ') !!}
                                {!! Form::input('text', 'data_fim', null, ['class' => 'datepicker']) !!}

                                {!! Form::submit('Pesquisar', ['class' => 'btn btn-info']) !!}

                            {!! Form::close() !!}
                        @else
                            <a href="/transactions">{!! Form::button('Voltar', ['class' => 'btn btn-info']) !!}</a>
                        @endif
                    </div>


                    <h4>
                        <a href="{{ route('transactions.create') }}">
                            <i class="fa fa-plus fa-fw" style="color: #337AB7; "></i>Novo Lançamento
                        </a>
                    </h4>

                @endif

            </div>
        </div>
    </div>

    @include('/modals/confirm_delete')

@endsection
