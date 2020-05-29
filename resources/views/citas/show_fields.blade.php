<!-- Paciente Id Field -->
<div class="form-group">
    {!! Form::label('paciente_id', 'Paciente Id:') !!}
    <p>{{ $cita->paciente_id }}</p>
</div>

<!-- Doctor Id Field -->
<div class="form-group">
    {!! Form::label('doctor_id', 'Doctor Id:') !!}
    <p>{{ $cita->doctor_id }}</p>
</div>

<!-- Date Cita Field -->
<div class="form-group">
    {!! Form::label('date_cita', 'Date Cita:') !!}
    <p>{{ $cita->date_cita }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cita->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cita->updated_at }}</p>
</div>

