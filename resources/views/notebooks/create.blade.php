    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    {!! Form::button('&times;', ['class' => 'close', 'data-dismiss' => 'modal', 'aria-hidden' => 'true']) !!}
                    <h4 class="modal-title" id="myModalLabel">Novo Caderno</h4>
                </div>
                {!! Form::open(['action' => 'NotebooksController@store']) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        {!! Form::button('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
