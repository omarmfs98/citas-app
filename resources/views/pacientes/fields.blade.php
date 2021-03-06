<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Secure Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('secure_id', 'Secure Id:') !!}
    {!! Form::select('secure_id', $secureItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pacientes.index') }}" class="btn btn-default">Cancel</a>
</div>
