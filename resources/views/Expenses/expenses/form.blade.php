<div class="form-group {{ $errors->has('for_whom') ? 'has-error' : '' }}">
    {!! Form::label('for_whom', 'Employee Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select class="form-control" name="for_whom" id="for_whom">
            @foreach ($user as $item)
            @if (!$item->hasRole('developer') & !$item->hasRole('Customer'))
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endif
            @endforeach
        </select>
        {!! $errors->first('for_whom', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('sum') ? 'has-error' : '' }}">
    {!! Form::label('sum', 'Sum', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number(
            'sum',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('sum', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    {!! Form::label('date', 'Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input type="date" name="date" placeholder="Date" id="date" onload="getDate()"
            value="<?php echo $today; ?>" class="form-control ">

        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name', 'Expense Name', ['class' => 'col-md-4 control-label']) !!}
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
        <input type="file" id="file" name="file[]" multiple accept=".xlsx, .pdf, .docx">
        {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
