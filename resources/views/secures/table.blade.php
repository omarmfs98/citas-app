<div class="table-responsive">
    <table class="table" id="secures-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($secures as $secure)
            <tr>
                <td>{{ $secure->name }}</td>
                <td>
                    {!! Form::open(['route' => ['secures.destroy', $secure->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('secures.show', [$secure->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('secures.edit', [$secure->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
