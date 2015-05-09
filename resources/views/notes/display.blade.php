@extends('app')

@section('content')

    <div class="main container-fluid"  ng-controller="appController">

        <div class="row">

            @include('/partials/sidebar')

            <div class="col-sm-9">

                <div class="row">

                    <div class="jumbotron">

                        <h1>Suas notas!</h1>

                        <hr/>

                        <div class="row">

                            @foreach($notes as $note_array)
                                @foreach($note_array as $note)

                                    @foreach($notebooks as $notebook)
                                        @if($note['notebook_id'] == $notebook['id'])
                                            <div id="note_display" class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">
                                                        <a href="{{ route('notebooks.notes.show', [$notebook, $note]) }}">{!! $note->title !!}</a>
                                                    </h3>
                                                </div>
                                                <div class="panel-body">
                                                    {!! $note->description !!}
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endforeach

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

@stop