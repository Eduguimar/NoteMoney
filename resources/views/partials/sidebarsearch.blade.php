<div class="col-sm-2" style="margin-right: 20px;">

    <h3>Cadernos</h3>


    <ul class="nav nav-stacked">
        <li style="font-size: 18px;"><a href="#" data-toggle="modal" data-target="#createNotebook"><i class="fa fa-plus fa-fw"></i> Novo caderno</a></li>
    </ul>

    <hr>

    <a href="/notebooks">{!! Form::button('Todos os Cadernos', ['class' => 'btn btn-default', 'style' => 'float: left;']) !!}</a>

    <br/>

    <br/>

    <ul id="sidebar" class="nav nav-stacked">

        @foreach($notebooks as $notebook_array)
            @foreach($notebook_array as $notebook)
                @if(isset($notebook))
                    <li><a href="{{ route('notebooks.show', $notebook) }}"><i class="fa fa-book fa-fw"></i>{!! $notebook->title !!}</a></li>
                @endif
            @endforeach
        @endforeach

    </ul>
</div>