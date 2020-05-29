<!-- Paciente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paciente_id', 'Paciente Id:') !!}
    {!! Form::select('paciente_id', $pacienteItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Date Cita Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_cita', 'Date Cita:') !!}
    {!! Form::select('date_cita', $schedulesItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('citas.index') }}" class="btn btn-default">Cancel</a>
</div>
