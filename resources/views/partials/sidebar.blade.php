<div class="col-sm-2" style="margin-right: 20px;">

    <h3>Cadernos</h3>


    <ul class="nav nav-stacked">
        <li style="font-size: 18px;"><a href="#" data-toggle="modal" data-target="#createNotebook"><i class="fa fa-plus fa-fw"></i> Novo caderno</a></li>
    </ul>

    <hr>

    {!! Form::open(['action' => 'NotebooksController@search', 'method' => 'GET']) !!}

        {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Procurar cadernos', 'style' => 'width: 82%; float: left;']) !!}

        <button type="submit" style="float: left; width: 33px; height: 33px;"><i class="fa fa-search"></i></button>

    {!! Form::close() !!}

    <br/>

    <br/>

    <ul id="sidebar" class="nav nav-stacked">

        @foreach($notebooks as $notebook)
            <li><a href="{{ route('notebooks.show', $notebook) }}"><i class="fa fa-book fa-fw"></i>{!! $notebook->title !!}</a></li>
        @endforeach

    </ul>
</div>