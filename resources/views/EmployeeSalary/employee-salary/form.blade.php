{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js"
    integrity="sha512-8Y8eGK92dzouwpROIppwr+0kPauu0qqtnzZZNEF8Pat5tuRNJxJXCkbQfJ0HlUG3y1HB3z18CSKmUo7i2zcPpg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
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

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    {!! Form::label('date', 'Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{-- {!! Form::number(
            'date',
            null,
            '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!} --}}
        <input class="form-control" type="date" name="date">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('start_hour') ? 'has-error' : '' }}">
    {!! Form::label('start_hour', 'Start Hour', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{-- {!! Form::text(
            'start_hour',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!} --}}
        <input class="form-control" id="start_hour" type="time" name="start_hour" id="">
        {!! $errors->first('start_hour', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('finish_hour') ? 'has-error' : '' }}">
    {!! Form::label('finish_hour', 'Finish Hour', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{-- {!! Form::text(
            'finish_hour',
            null,
            'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
        ) !!} --}}
        <input class="form-control" id="finish_hour" type="time" name="finish_hour" id="">
        {!! $errors->first('finish_hour', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if (auth()->user()->hasRole('admin') ||
    auth()->user()->hasRole('developer'))
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
<div class="form-group {{ $errors->has('rate') ? 'has-error' : '' }}">
    {!! Form::label('rate', 'Rate', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number(
            'rate',
            null,
            '' == 'required'
                ? ['class' => 'form-control', 'required' => 'required']
                : ['class' => 'form-control', 'id' => 'rate'],
        ) !!}
        {!! $errors->first('rate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{-- @isset($employeesalary->finish_hour) --}}
<div class="form-group {{ $errors->has('number_of_hours') ? 'has-error' : '' }}">
    {!! Form::label('number_of_hours', 'Number Of Hours', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input class="form-control" id="number_of_hours" type="text" {{-- value={{ abs((strtotime($employeesalary->finish_hour) - strtotime($employeesalary->start_hour)) / 3600) }} --}} value=''
            name="number_of_hours"  placeholder='get value by olicking on "Number Of Hours" button' readonly>
        <input type='button' value='Number Of Hours' onclick="get_number_of_hours()" 
       />
        {!! $errors->first('number_of_hours', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sum') ? 'has-error' : '' }}">
    {!! Form::label('sum', 'Sum', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input class="form-control" id="sum" type="text" value='' {{-- {{ abs((strtotime($employeesalary->finish_hour) - strtotime($employeesalary->start_hour)) / 3600) * $employeesalary->rate }} --}}
        placeholder='get value by clicking on "Sum" button'
        readonly>
        <input type='button' value='Sum' onclick="get_rate()" />
        {!! $errors->first('sum', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- @endisset --}}

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    {!! Form::label('type', 'Paid in cash', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input type="checkbox" name="type" value="Paid in cash">
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('extra_bonus') ? 'has-error' : '' }}">
    {!! Form::label('extra_bonus', 'Extra bonus', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input class="form-control" type="text" name="for_what" placeholder="Bonus For What">
        {!! $errors->first('for_what', '<p class="help-block">:message</p>') !!}
        <input class="form-control" id="total_sum" type="float" name="bonus_sum" placeholder="Bonus Amount"
            onkeyup="get_sum()">
        {!! $errors->first('bonus_sum', '<p class="help-block">:message</p>') !!}
        <input class="form-control" id="total_total" type="text" name="sum" value='' 
        placeholder='Calculated "Total Sum" will be Generated Autometically' 
        readonly
             {{-- placeholder="Total (=start/fnish * rate) + bonus sum" --}}>
        {{-- <input id="total"  value="total_sum" type='button' onkeyup="get_sum()" /> --}}
        {{-- <input id="total"  value="total_sum" type='button' onclick="get_sum()" /> --}}
        {!! $errors->first('Total Sum', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

<script>
    function get_number_of_hours() {
        let start_hour = document.getElementById('start_hour').value
        let finish_hour = document.getElementById('finish_hour').value

        number_of_hours = (eval((parseFloat(finish_hour) - parseFloat(start_hour))));
        console.log(eval((parseFloat(start_hour) - parseFloat(finish_hour))));
        console.log(number_of_hours +
            'number_of_hours');
        document.getElementById('number_of_hours').value = Math.abs(number_of_hours)
        return number_of_hours
    }

    function get_rate() {
        let number_of_hours = document.getElementById('number_of_hours').value
        console.log(number_of_hours +
            'number_of_hours');
        let rate = document.getElementById('rate').value
        console.log(rate +
            'rate');
        // number_of_hours = (eval((parseFloat(finish_hour) - parseFloat(start_hour))));

        sum = (((parseFloat(rate) * parseFloat(number_of_hours))));
        console.log(sum);
        document.getElementById('sum').value = Math.abs(sum)
        return sum
    }
    // function get_sum(val) {
    function get_sum() {

        let total_sum = document.getElementById('total_sum').value
        console.log(total_sum);
        let sum = document.getElementById('sum').value
        console.log(sum);

        total_total = (((parseFloat(total_sum) + parseFloat(sum))));
        console.log(total_total);

        // console.log(document.getElementById('total_total').value)
        document.getElementById('total_total').value = Math.abs(total_total)

        // document.getElementById('sum').value += total_sum
        // document.getElementById('total_sum').value += parseFloat(total_sum)

        // document.getElementById('total_sum').value = Math.abs(total)
        // let sum = document.getElementById('sum').value


        return total_total

    }
</script>
