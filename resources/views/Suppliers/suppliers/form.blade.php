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
<div class="form-group {{ $errors->has('sum') ? 'has-error' : '' }}">
    {!! Form::label('sum', 'Sum', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{-- {!! Form::number('sum', null, ('required' == 'required' , 'step' == '1') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} --}}
        <input type="float" class='form-control' required name="sum">
        {!! $errors->first('sum', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('date_of_order') ? 'has-error' : '' }}">
    {!! Form::label('date_of_order', 'Date Of Order', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date(
            'date_of_order',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('date_of_order', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('date_of_delivery') ? 'has-error' : '' }}">
    {!! Form::label('date_of_delivery', 'Date Of Delivery', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date(
            'date_of_delivery',
            null,
            '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('date_of_delivery', '<p class="help-block">:message</p>') !!}
    </div>
</div>

            {{-- @if (auth()->user()->hasRole('admin') ||
                auth()->user()->hasRole('developer'))
                <div class="form-group {{ $errors->has('restaurant_id') ? 'has-error' : '' }}">
                    {!! Form::label('restaurant_id', 'Restaurant Name', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        <input type="text" class="form-control" value="{{ $restaurant->name }}" readonly>
                        <input type="hidden" name="restaurant_id" class="form-control" value="{{ $restaurant->id }}" readonly>
                        {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            @endif --}}

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
