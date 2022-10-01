<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('date_of_employment') ? 'has-error' : ''}}">
    {!! Form::label('date_of_employment', 'Date Of Employment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('date_of_employment', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('date_of_employment', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('end_of_work_date') ? 'has-error' : ''}}">
    {!! Form::label('end_of_work_date', 'End Of Work Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('end_of_work_date', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('end_of_work_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
    {!! Form::label('telephone', 'Telephone', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('telephone', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('status', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('restaurant_id') ? 'has-error' : ''}}">
    {!! Form::label('restaurant_id', 'Restaurant Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('restaurant_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('salary') ? 'has-error' : ''}}">
    {!! Form::label('salary', 'Salary', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('salary', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('salary', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

<script>
    var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
</script>