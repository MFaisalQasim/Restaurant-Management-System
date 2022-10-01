<div class="form-group {{ $errors->has('employee_complete_name') ? 'has-error' : '' }}">
    {!! Form::label('employee_complete_name', 'Employee Complete Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if (auth()->user()->hasRole('admin') ||
            auth()->user()->hasRole('developer'))
            <select class="select form-control" id="employee_complete_name"
                name="employee_complete_name">
                @foreach ($user as $item)
                    @if (!$item->hasRole('developer') & !$item->hasRole('Customer'))
                        @if ($item->restaurant_id == $url_restaurant_id)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                            {{-- <input class="form-control" type="text" id="employee_complete_name"
                            name="employee_complete_name" value="{{ $item->name }}" readonly> --}}
                        @endif
                    @endif
                @endforeach
            </select>
            @else
                <input class="form-control" type="text" id="employee_complete_name"
                name="employee_complete_name" value="{{auth()->user()->name}}" readonly>
        @endif
        {!! $errors->first('employee_complete_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- @if (auth()->user()->hasRole('admin') ||
    auth()->user()->hasRole('developer')) --}}
<div class="form-group {{ $errors->has('restaurant_id') ? 'has-error' : '' }}">
    {!! Form::label('restaurant_id', 'Restaurant Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input type="text" class="form-control" value="{{ $restaurant->name }}" readonly>
        {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- @endif --}}

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