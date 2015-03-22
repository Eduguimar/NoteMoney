@extends('app')

@section('content')

    <h1>Homepage!</h1>

    @foreach($notebooks as $notebook)
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a href="{{ route('notebooks.show', $notebook) }}">{!! $notebook->title !!}</a>
                    </h3>
                </div>
                <div class="panel-body">
                    {!! $notebook->description !!}
                </div>
        </div>
    @endforeach

@stop