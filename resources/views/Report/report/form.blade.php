<div class="form-group {{ $errors->has('total_income') ? 'has-error' : '' }}">
    {!! Form::label('total_income', 'Total Income', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number(
            'total_income',
            null,
            '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('total_income', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('card_transactions') ? 'has-error' : '' }}">
    {!! Form::label('card_transactions', 'Card Transactions', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number(
            'card_transactions',
            null,
            '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('card_transactions', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('canceled_sale') ? 'has-error' : '' }}">
    {!! Form::label('canceled_sale', 'Canceled Sale', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number(
            'canceled_sale',
            null,
            '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('canceled_sale', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('supplier_cash') ? 'has-error' : '' }}">
    {!! Form::label('supplier_cash', 'Supplier Cash', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number(
            'supplier_cash',
            null,
            '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('supplier_cash', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('bank_cash_total') ? 'has-error' : '' }}">
    {!! Form::label('bank_cash_total', 'Bank Cash Total', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number(
            'bank_cash_total',
            null,
            '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('bank_cash_total', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- <div class="form-group {{ $errors->has('restaurant_id') ? 'has-error' : ''}}">
    {!! Form::label('restaurant_id', 'Restaurant Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('restaurant_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('report_handler') ? 'has-error' : ''}}">
    {!! Form::label('report_handler', 'Report Handler', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('report_handler', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('report_handler', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
