@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Specialty
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($specialty, ['route' => ['specialties.update', $specialty->id], 'method' => 'patch']) !!}

                        @include('specialties.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection