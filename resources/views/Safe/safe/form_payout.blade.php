{{-- <div class="form-group {{ $errors->has('employee_complete_name') ? 'has-error' : '' }}">
    {!! Form::label('employee_complete_name', 'Employee Complete Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text(
            'employee_complete_name',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('employee_complete_name', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
@if (auth()->user()->hasRole('admin') ||
    auth()->user()->hasRole('developer'))
    <div class="form-group {{ $errors->has('restaurant_id') ? 'has-error' : '' }}">
        {!! Form::label('restaurant_id', 'Restaurant Id', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">

            <input type="text" class="form-control" value="{{$restaurant->name}}" readonly>
            {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endif

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    {!! Form::label('date', 'Date of Transaction', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        
        <input type="date" name="date" placeholder="Date" id="date"
            onload="getDate()" value="<?php echo $today; ?>"
            class="form-control">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('payout') ? 'has-error' : '' }}">
    {!! Form::label('payout', 'Enter Payout', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number(
            'payout',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('payout', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- <div class="form-group {{ $errors->has('ty_of_transaction') ? 'has-error' : '' }}">
    {!! Form::label('ty_of_transaction', 'Type of Transaction', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input type="checkbox" name="ty_of_transaction" id="ty_of_transaction" value="PayCheck">
        {!! $errors->first('ty_of_transaction', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
{{-- <div class="form-group {{ $errors->has('date_of_deposited') ? 'has-error' : '' }}">
    {!! Form::label('date_of_deposited', 'Type of Deposited', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date(
            'date_of_deposited',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('date_of_deposited', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('date_of_withdrawal') ? 'has-error' : '' }}">
    {!! Form::label('date_of_withdrawal', 'Date of Withdrawal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date(
            'date_of_withdrawal',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('date_of_withdrawal', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
