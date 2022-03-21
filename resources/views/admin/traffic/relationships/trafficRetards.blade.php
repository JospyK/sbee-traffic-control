@can('retard_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.retards.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.retard.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.retard.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-trafficRetards">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.retard.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.retard.fields.duree') }}
                        </th>
                        <th>
                            {{ trans('cruds.retard.fields.traffic') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($retards as $key => $retard)
                        <tr data-entry-id="{{ $retard->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $retard->id ?? '' }}
                            </td>
                            <td>
                                {{ $retard->duree ?? '' }}
                            </td>
                            <td>
                                {{ $retard->traffic->entre ?? '' }}
                            </td>
                            <td>
                                @can('retard_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.retards.show', $retard->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('retard_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.retards.edit', $retard->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('retard_delete')
                                    <form action="{{ route('admin.retards.destroy', $retard->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('retard_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.retards.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-trafficRetards:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection