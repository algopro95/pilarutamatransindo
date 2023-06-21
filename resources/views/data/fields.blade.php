<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Kota Origin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kota_origin', 'Kota Origin:') !!}
    {!! Form::text('kota_origin', null, ['class' => 'form-control']) !!}
</div>

<!-- Kota Destinasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kota_destinasi', 'Kota Destinasi:') !!}
    {!! Form::text('kota_destinasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Kendaraan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kendaraan', 'Kendaraan:') !!}
    {!! Form::text('kendaraan', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::text('harga', null, ['class' => 'form-control']) !!}
</div>