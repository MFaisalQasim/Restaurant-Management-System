<div class="form-group {{ $errors->has('test') ? 'has-error' : ''}}">
    {!! Form::label('test', 'Test', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('test', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('test', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
