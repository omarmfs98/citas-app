<!-- Paciente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paciente_id', 'Paciente Id:') !!}
    {!! Form::select('paciente_id', $pacienteItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Doctor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('doctor_id', 'Doctor Id:') !!}
    {!! Form::select('doctor_id', $doctorItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Date Cita Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_cita', 'Date Cita:') !!}
    {!! Form::text('date_cita', null, ['class' => 'form-control','id'=>'date_cita']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_cita').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('citas.index') }}" class="btn btn-default">Cancel</a>
</div>
