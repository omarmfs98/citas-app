@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Secure
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($secure, ['route' => ['secures.update', $secure->id], 'method' => 'patch']) !!}

                        @include('secures.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection