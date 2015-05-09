<div class="col-sm-2" style="margin-right: 20px;">

    <div ng-init="notebooks = $notebooks"></div>

    <h3>Cadernos</h3>

    <ul class="nav nav-stacked">
        <li><a href="#" data-toggle="modal" data-target="#createNotebook"><i class="fa fa-plus fa-fw"></i> Novo caderno</a></li>
    </ul>

    <hr>

    <ul id="sidebar" class="nav nav-stacked">

        <input type="text" placeholder="Procurar cadernos" ng-model="search">

        @foreach($notebooks as $notebook)
            <li><a href="{{ route('notebooks.show', $notebook) }}"><i class="fa fa-book fa-fw"></i>{!! $notebook->title !!}</a></li>
        @endforeach

    </ul>
</div>