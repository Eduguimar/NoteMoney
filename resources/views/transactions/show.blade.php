@extends('app')

@section('content')

    <div class="main container-fluid">

        <div class="row">

            <div class="col-sm-10 col-sm-offset-1">

                <div class="jumbotron">

                    @if($transaction['type'] == 'income')
                        <h3 class="well" style="color: #138921; width: 12%; float: right;">Receita</h3>
                    @else
                        <h3 class="well" style="color: #C30707; width: 14%; float: right;">Despesa</h3>
                    @endif

                    <h1>{!! $transaction->title !!}</h1>

                        <br/>
                        <br/>

                    <div class="row">

                        {!! Form::open(['route' => ['transactions.destroy', $transaction], 'method' => 'DELETE']) !!}

                            {!! Form::submit('Excluir Lançamento', ['class' => 'btn btn-danger confirm-delete', 'style' => 'float: right', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Excluir Lançamento', 'data-message' => 'Deseja realmente excluir este lançamento?']) !!}

                            <a href="{{ route('transactions.edit', $transaction) }}" style="float: right; margin-right: 20px;">{!! Form::button('Editar Lançamento', ['class' => 'btn btn-warning']) !!}</a>

                        {!! Form::close() !!}

                    </div>

                    <hr/>

                    <div class="row">

                        @if($transaction->description)
                            <div class="panel panel-default" style="width: 75%; float: left;">
                                <div class="panel-body">
                                    <p>{!! $transaction->description !!}</p>
                                </div>
                            </div>
                        @endif

                        <div style="float: right;">
                            Criado em: {!! date('d/m/Y', strtotime($transaction->created_at)) !!}
                            <br/>
                            Última modificação em: {!! date('d/m/Y', strtotime($transaction->updated_at)) !!}
                        </div>

                    </div>

                    <h3>R$ {!! number_format($transaction['amount'], 2, ',', '.') !!}</h3>


                    <a href="{{ route('transactions.index') }}">{!! Form::button('Voltar', ['class' => 'btn btn-default btn-lg', 'style' => 'margin: 40px 0;']) !!}</a>


                </div>

            </div>
        </div>
    </div>

    @include('/modals/confirm_delete')

@endsection