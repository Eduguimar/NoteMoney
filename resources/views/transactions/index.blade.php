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
                            <th>Excluir</th>
                        </tr>
                        @foreach( $transactions as $transaction )
                            @if($transaction['type'] == 'income')
                                <tr class="success">
                                    <td><a href="{{ route('transactions.show', $transaction) }}" class="receita">{!! date('d-m-Y', strtotime($transaction->created_at)) !!}</a></td>
                                    <td><a href="{{ route('transactions.show', $transaction) }}" class="receita">{!! $transaction->title !!}</a></td>
                                    <td class="receita">{!! $transaction->amount !!}</td>

                                    {!! Form::open(['route' => ['transactions.destroy', $transaction], 'method' => 'DELETE']) !!}

                                        <td style="text-align: center;"><a href="{{ route('transactions.edit', $transaction) }}" style="color: #444;">{!! Form::button('<i class="fa fa-pencil-square-o"></i>') !!}</a></td>

                                        <td style="text-align: center;">{!! Form::button('<i class="fa fa-trash-o"></i>', array('type' => 'submit', 'class' => 'confirm-delete', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Excluir Lançamento', 'data-message' => 'Deseja realmente excluir este lançamento?'))  !!}</td>

                                    {!! Form::close() !!}

                                </tr>
                            @else
                                <tr class="danger despesa">
                                    <td><a href="{{ route('transactions.show', $transaction) }}" class="despesa">{!! date('d-m-Y', strtotime($transaction->created_at)) !!}</a></td>
                                    <td><a href="{{ route('transactions.show', $transaction) }}" class="despesa">{!! $transaction->title !!}</a></td>
                                    <td class="despesa">{!! $transaction->amount !!}</td>

                                    {!! Form::open(['route' => ['transactions.destroy', $transaction], 'method' => 'DELETE']) !!}

                                        <td style="text-align: center;"><a href="{{ route('transactions.edit', $transaction) }}" style="color: #444;">{!! Form::button('<i class="fa fa-pencil-square-o"></i>') !!}</a></td>

                                        <td style="text-align: center;">{!! Form::button('<i class="fa fa-trash-o"></i>', array('type' => 'submit', 'class' => 'confirm-delete', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Excluir Lançamento', 'data-message' => 'Deseja realmente excluir este lançamento?'))  !!}</td>

                                    {!! Form::close() !!}

                                </tr>
                            @endif
                        @endforeach
                    </table>
                @endif

                <h3>
                    {!! link_to_route('transactions.create', 'Criar Novo Lançamento') !!}
                </h3>

            </div>
        </div>
    </div>

    @include('/modals/confirm_delete')

@endsection