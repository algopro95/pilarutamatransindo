<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $data->user_id }}</p>
</div>

<!-- Kota Origin Field -->
<div class="col-sm-12">
    {!! Form::label('kota_origin', 'Kota Origin:') !!}
    <p>{{ $data->kota_origin }}</p>
</div>

<!-- Kota Destinasi Field -->
<div class="col-sm-12">
    {!! Form::label('kota_destinasi', 'Kota Destinasi:') !!}
    <p>{{ $data->kota_destinasi }}</p>
</div>

<!-- Kendaraan Field -->
<div class="col-sm-12">
    {!! Form::label('kendaraan', 'Kendaraan:') !!}
    <p>{{ $data->kendaraan }}</p>
</div>

<!-- Harga Field -->
<div class="col-sm-12">
    {!! Form::label('harga', 'Harga:') !!}
    <p>{{ $data->harga }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $data->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $data->updated_at }}</p>
</div>

