@extends('layouts.admin')
@section('content')
@can('traffic_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('admin.traffic.create') }}">
            {{ trans('global.add') }} une entrée
            {{-- {{ trans('cruds.traffic.title_singular') }} --}}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.list') }} des {{ trans('cruds.traffic.title') }}
    </div>
    <div class="card-body">
        @if (Auth::user()->roles->first()->title != 'Garde')
        @include('admin.components.dateFilter')
        @endif

        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Traffic">
            <thead>
                <tr>
                    <th width="5"></th>
                    <th>&nbsp;</th>
                    <th>
                        {{ trans('cruds.traffic.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.matricule') }}
                    </th>
                    @if (!Auth::user()->roles->first()->title == 'Garde')
                    <th>
                        {{ trans('cruds.traffic.fields.id') }}
                    </th>
                    @endif
                    <th>
                        {{ trans('cruds.traffic.fields.entre') }}
                    </th>
                    <th>
                        {{ trans('cruds.traffic.fields.sortie') }}
                    </th>
                    <th>
                        {{ trans('cruds.traffic.fields.temperature') }}
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {

  let dtButtons = [];
  @can('btn_access')
    dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    @can('traffic_delete')
    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
    let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.traffic.massDestroy') }}",
        className: 'btn-danger',
        action: function (e, dt, node, config) {
        var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
            return entry.id
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
  @endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: {
        "url" : "{{ route('admin.traffic.filter', $date) }}",
        "type" : "GET",
        data: function (d) {
            d.date = $('#datef').val();
        }
    },
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'actions', name: '{{ trans('global.actions') }}' },
        { data: 'user_name', name: 'user.name' },
        { data: 'user_matricule', name: 'user.matricule' },
        @if (!Auth::user()->roles->first()->title == 'Garde')
        { data: 'id', name: 'id' },
        @endif
        { data: 'entre', name: 'entre' },
        { data: 'sortie', name: 'sortie' },
        { data: 'temperature', name: 'temperature' },
    ],
    orderCellsTop: true,
    order: [[ 4, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Traffic').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

});

</script>
@endsection
