<div class="table-responsive">
    <table class="table" id="data-table">
        <thead>
        <tr>
            <th>User Id</th>
        <th>Kota Origin</th>
        <th>Kota Destinasi</th>
        <th>Kendaraan</th>
        <th>Harga</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $data)
            <tr>
                <td>{{ $data->user_id }}</td>
            <td>{{ $data->kota_origin }}</td>
            <td>{{ $data->kota_destinasi }}</td>
            <td>{{ $data->kendaraan }}</td>
            <td>{{ $data->harga }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['data.destroy', $data->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('data.show', [$data->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('data.edit', [$data->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
