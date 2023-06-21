@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Search Data</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'searching']) !!}

            <div class="card-body">

                <div class="row">


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


</div>

</div>

<div class="card-footer">
    {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('data.index') }}" class="btn btn-default">Cancel</a>
</div>

{!! Form::close() !!}

</div>
</div>
@endsection
