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
        {!! Form::label('restaurant_id', 'Restaurant Name', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">

            {{-- <select class="form-select" aria-label="Default select example" name="restaurant_id">
                @foreach ($restaurant as $item)
                <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                    
                @endforeach
            </select> --}}
            <input type="text" class="form-control" value="{{$restaurant->name}}" readonly>
            {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endif
{{-- <div class="form-group {{ $errors->has('sum') ? 'has-error' : '' }}">
    {!! Form::label('sum', 'Amount', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number(
            'sum',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('sum', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="form-group {{ $errors->has('deposite') ? 'has-error' : '' }}">
    {!! Form::label('deposite', 'Enter Deposite', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number(
            'deposite',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('deposite', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    {!! Form::label('date', 'Date of Transaction', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{-- {!! Form::date(
            'date',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', ''],
        ) !!} --}}
        <input type="date" name="date" placeholder="Date" id="date"
            onload="getDate()" value="<?php echo $today; ?>"
            class="form-control">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
