@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear nueva Etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.tags.store']) !!}
            @include('admin.tags.partials.form')
            {{-- <div class="form-group">
                <label for="">Color</label>
                <select name="color" id="color" class="form-control">
                    <option value="red">Color rojo</option>
                    <option value="green">Color verde</option>
                    <option value="blue" selected>Color azul</option>
                </select>
            </div> --}}


            {!! Form::submit('Crear etiqueta', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

{{-- Se instalo plugin de jquery para crear automaticamente el slug (stringToSlug) --}}

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
