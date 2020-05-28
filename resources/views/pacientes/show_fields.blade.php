<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $paciente->user_id }}</p>
</div>

<!-- Secure Id Field -->
<div class="form-group">
    {!! Form::label('secure_id', 'Secure Id:') !!}
    <p>{{ $paciente->secure_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $paciente->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $paciente->updated_at }}</p>
</div>

