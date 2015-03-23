@extends('app')

@section('content')

    <h1>Lista de cadernos</h1>

    <div class="row">

        <div class="col-sm-3">
            <h3>Toolbox</h3>

            <hr>

            <ul id="sidebar" class="nav nav-stacked">
                <li><a href="#"><i class="glyphicon glyphicon-envelope"></i> E-mail</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Usuário</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-book"></i> Cadernos</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-file"></i> Notas</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-usd"></i> Lançamentos</a></li>
            </ul>
        </div>

        <div class="col-sm-9">

            @foreach($notebooks as $notebook)
                <div id="notebook" class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a href="{{ route('notebooks.show', $notebook) }}">{!! $notebook->title !!}</a>
                        </h3>
                    </div>
                    <div id="notebook-description" class="panel-body">
                        {!! $notebook->description !!}
                    </div>
                </div>
            @endforeach

        </div>

    </div>

@stop