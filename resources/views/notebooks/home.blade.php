@extends('app')

@section('content')

    <div class="main container-fluid">

        <div class="row">

            @include('/partials/sidebar')

            <div class="col-sm-9">

                <h2>Cadernos</h2>

                <hr>

                @foreach($notebooks as $notebook)
                    <div id="notebook" class="panel panel-default">
                        <div class="panel-heading heading">
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

    </div>

@stop