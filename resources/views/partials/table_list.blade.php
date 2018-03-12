@if ($items->count())
    <table class="table table-striped table-bordered table-hover dataTable" id="dataTable">
        <thead>
        <tr>
            @foreach($columns as $column)
                <th>{{$column['name']}}</th>
            @endforeach
            <th>Estado</th>
            <th class="no-sort">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                @foreach($columns as $column)
                    <td>{!! $item->{$column['db_column']} !!}</td>
                @endforeach
                <td>
                    @if($item->status === 'ACTIVE')
                        <span class="label label-sm label-success">Activo</span>
                    @else
                        <span class="label label-sm label-warning">Inactivo</span>
                    @endif
                </td>
                <td>
                    @if(!in_array($item->id, $action['unavailable_ids']))
                        <a href="{{ URL::to($action['route'] . $item->id) }}" id="go_{{ $item->id }}"
                           key="{{ $item->id }}"
                           class="btn default btn-xs yellow-stripe"
                           title="Ver restaurantes">{!! $action['icon'] !!} {{$action['label']}}</a>
                    @endif
                </td>
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
