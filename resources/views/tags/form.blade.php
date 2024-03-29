@extends('layouts.admin')
@section('content')
    <div class="col-md-3">
        <h3>Create Tag</h3>
        {!! \Form::open() !!}
            <div class="form-group">
                {!! Form::label('name', 'Tag Name') !!}
                {!! Form::text('name', isset($tag) ? $tag->name : null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('color', 'Color') !!}
                {!! Form::text('color', isset($tag) ? $tag->color : null, ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit(isset($tag) ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection
