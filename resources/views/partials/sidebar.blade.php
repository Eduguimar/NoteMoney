<div class="col-sm-2" style="margin-right: 20px;">
    <h3>Cadernos</h3>

    <hr>

    <ul id="sidebar" class="nav nav-stacked">

        @foreach($notebooks as $notebook)
            <li><a href="{{ route('notebooks.show', $notebook) }}"><i class="fa fa-book fa-fw"></i>{!! $notebook->title !!}</a></li>
        @endforeach

    </ul>
</div>