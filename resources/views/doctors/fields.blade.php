<!-- Specility Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('specialty_id', 'Specility Id:') !!}
    {!! Form::select('specialty_id', $specialtyItems, null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('doctors.index') }}" class="btn btn-default">Cancel</a>
</div>
