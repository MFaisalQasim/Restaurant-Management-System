<div class="form-group {{ $errors->has('for_whom') ? 'has-error' : '' }}">
    {!! Form::label('for_whom', 'For Whom', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text(
            'for_whom',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('for_whom', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('developer'))
<div class="form-group {{ $errors->has('restaurant_id') ? 'has-error' : '' }}">
    {!! Form::label('restaurant_id', 'Restaurant Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">

        <select class="form-select" aria-label="Default select example" name="restaurant_id">
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
    
@endif
{{-- <div class="form-group {{ $errors->has('sum') ? 'has-error' : '' }}">
    {!! Form::label('sum', 'Sum', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number(
            'sum',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('sum', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    {!! Form::label('date', 'Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date(
            'date',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text(
            'name',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
    {!! Form::label('file', 'File', ['class' => 'col-md-4 control-label', 'enctype' => 'multipart/form-data']) !!}
    <div class="col-md-6">
        {{-- {!! Form::text('file', null, ('' == 'required') ? ['class' => 'form-control',  "type"=>"file", 'required' => 'required'] : ['class' => 'form-control']) !!} --}}
        <input type="file" id="file" name="file[]" multiple accept=".xlsx, .pdf, .docx">
        {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
