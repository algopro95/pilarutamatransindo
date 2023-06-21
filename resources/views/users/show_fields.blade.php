<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Last Name Field -->
<div class="col-sm-12">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{{ $user->last_name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div>

<!-- Birth Date Field -->
<div class="col-sm-12">
    {!! Form::label('birth_date', 'Birth Date:') !!}
    <p>{{ $user->birth_date }}</p>
</div>

<!-- Whatsapp Field -->
<div class="col-sm-12">
    {!! Form::label('whatsapp', 'Whatsapp:') !!}
    <p>{{ $user->whatsapp }}</p>
</div>

<!-- Id Name Field -->
<div class="col-sm-12">
    {!! Form::label('id_name', 'Id Name:') !!}
    <p>{{ $user->id_name }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $user->password }}</p>
</div>

<!-- Remember Token Field -->
<div class="col-sm-12">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $user->remember_token }}</p>
</div>

