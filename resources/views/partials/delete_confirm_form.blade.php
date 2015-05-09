{!! Form::open(['route' => ['transactions.destroy', $transaction], 'method' => 'DELETE']) !!}

    <td style="text-align: center;"><a href="{{ route('transactions.edit', $transaction) }}" style="color: #444;">{!! Form::button('<i class="fa fa-pencil-square-o"></i>') !!}</a></td>

    <td style="text-align: center;">{!! Form::button('<i class="fa fa-trash-o"></i>', array('type' => 'submit', 'class' => 'confirm-delete', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Excluir Lançamento', 'data-message' => 'Deseja realmente excluir este lançamento?'))  !!}</td>

{!! Form::close() !!}

@include('/modals/confirm_delete')