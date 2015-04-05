@extends('app')

@section('content')
    <h1 class="page-heading">Lançamentos</h1>

    @if ( !$transactions->count() )
        <h2>Você ainda não possui lançamentos!</h2>
    @else
        <h2>Total = R$ {!! $totalAmount !!}</h2>
        <ul>
            @foreach( $transactions as $transaction )
                <li>
                    <h2> {!! $transaction->title !!} </h2>
                    <br>
                    {!! $transaction->description !!}
                    <br>
                    @if($transaction['type'] == 'income')
                        Receita
                    @else
                        Despesa
                    @endif
                    <br>
                    {!! $transaction->amount !!}
                </li>
            @endforeach
        </ul>
    @endif

    <p>
        {!! link_to_route('transactions.create', 'Criar Novo Lançamento') !!}
    </p>
@endsection