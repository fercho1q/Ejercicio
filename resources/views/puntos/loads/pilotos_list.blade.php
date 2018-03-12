@if ($items->count())
    <table class="table table-striped table-bordered table-hover dataTable" id="dataTable">
        <thead>
        <tr>
            <th>Nombre</th>
            @foreach($columns as $column)
                <th>{{$column['name']}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>

                <td>
                    <a style="cursor: pointer" onclick="sumPuntos({!! $item->id!!})">{!! $item->nombre !!}</a>
                </td>
                @foreach($columns as $column)
                    <td>{!! $item->{$column['db_column']} !!}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>

@else
    <div class="row">
        <div class="col-md-offset-2 col-md-8 text-center alert alert-{{$empty_class}}">
            {!! $empty_message !!}
        </div>
    </div>
@endif