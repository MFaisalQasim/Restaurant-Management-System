<div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
    {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6" style="display: flex   ;  justify-content: space-between;">
        <div>
            <input type="date" name="date" placeholder="Date" id="date" onload="getDate()" placeholder="Date"
                value="<?php echo $today; ?>" class="form-control">
        </div>
        <div class="topnav search_icon_div " style="display: flex;
                ">
            {{-- <button onclick="employee_fetch()" class="search_button">
                <img src="{{ asset('assets/images/search_icon_bar.png') }}" alt="">
            </button> --}}

            {{-- <input class="form-control mr-sm-2 keywords_search" id="keywords_search" name="keywords_search"
                type="search" onkeyup="employee_fetch()" value="" placeholder="Employee" aria-label="Search"> --}}

            {{-- <div class="input-group">
                <div id="search-autocomplete" class="form-outline">
                    <input type="search" id="keywords_search" class="form-control" onkeyup="employee_fetch()" />
                    <label class="form-label" for="keywords_search">Search</label>
                </div>
                <button type="button" class="btn btn-primary" onclick="employee_fetch()">
                    <i class="fas fa-search"></i>
                </button>
            </div> --}}
            <label class="form-label mt-3" for="keywords_search">Employee : </label>

            <select class="select" data-mdb-filter="true" onchange="employee_fetch();" id="keywords_search"
                name="keywords_search">
                @foreach ($EmployeeSalary as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group  {{ $errors->has('start_hour') ? 'has-error' : '' }}  ">
    {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class=" row ">
            {!! Form::label('', 'Start Hour', ['class' => 'col-2 control-label p-0 pt-2']) !!}
            <div class="col  pl-0 pr-0 ">
                <input class="form-control" id="start_hour" type="time" name="start_hour" id=""
                    placeholder="Start Hour">
                {!! $errors->first('start_hour', '<p class="help-block">:message</p>') !!}
            </div>
            {!! Form::label('', 'Finish Hour', ['class' => 'col-2 control-label p-0 pt-2']) !!}
            <div class="col  pl-0 pr-0 ">
                <input class="form-control" id="finish_hour" type="time" name="finish_hour" id=""
                    placeholder="Finish Hour">
                {!! $errors->first('finish_hour', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>
<div class="form-group {{ $errors->has('rate') ? 'has-error' : '' }}">
    {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input class="form-control" type="number" name="rate" id="rate" placeholder="Rate"
            onkeyup="get_number_of_hours()" {{-- onchange="get_number_of_hours()" --}} required>
        {!! $errors->first('rate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<input class="form-control" id="number_of_hours" type="hidden" value='' name="number_of_hours"
    placeholder='value of "Number Of Hours" ' readonly>
{!! $errors->first('number_of_hours', '<p class="help-block">:message</p>') !!}


<div class="form-group {{ $errors->has('sum') ? 'has-error' : '' }}">
    {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input class="form-control" id="sum" type="text" value='' placeholder=' value of "Sum" '
            name="sum" readonly>
        {!! $errors->first('sum', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-6 m-2">
            {!! Form::label('type', 'Extra bonus', ['class' => ' control-label']) !!}
        </div>
    </div>
</div>
<div class="form-group {{ $errors->has('extra_bonus') ? 'has-error' : '' }}">
    {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="row">
            <div class="col">
                <input class="form-control" type="text" name="for_what" placeholder="Bonus For What">
                {!! $errors->first('for_what', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col">
                <input class="form-control" id="total_sum" type="float" name="bonus_sum" placeholder="Bonus Amount"
                    required onkeyup="get_sum()">
                {!! $errors->first('bonus_sum', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>
<div class="form-group {{ $errors->has('extra_bonus') ? 'has-error' : '' }}">
    {!! Form::label('extra_bonus', ' ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input class="form-control" id="total_total" type="text" name="total_sum" value=''
            placeholder='Calculated "Total Sum" will be Generated Autometically' readonly {{-- placeholder="Total (=start/fnish * rate) + bonus sum" --}}>
        {{-- <input id="total"  value="total_sum" type='button' onkeyup="get_sum()" /> --}}
        {{-- <input id="total"  value="total_sum" type='button' onclick="get_sum()" /> --}}
        {!! $errors->first('Total Sum', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input type="checkbox" name="type" value="Paid in cash">
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
        {!! Form::label('type', 'Paid in cash', ['class' => ' control-label']) !!}
    </div>
    <div class="col-md-offset-6 col-md-6">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Save', ['class' => 'btn btn-primary']) !!}
    </div>
    <input type="hidden" name="url_restaurant_id" id="url_restaurant_id"value="{{ $url_restaurant_id }}">
</div>

<script>
    function get_number_of_hours() {
        let start_time = document.getElementById('start_hour').value;
        let finish_time = document.getElementById('finish_hour').value;
        console.log(start_hour);
        console.log(finish_hour);
        var start_hour_arr = start_time.split(':');
        console.log(start_hour_arr.slice(0, 1) + 'start_hour_arr hour');
        console.log(start_hour_arr.slice(1, 2) + 'start_hour_arr min');

        var finish_hour_arr = finish_time.split(':');
        console.log(finish_hour_arr + 'finish_hour_arr');
        console.log(finish_hour_arr.slice(0, 1) + 'finish_hour_arr hour');
        console.log(finish_hour_arr.slice(1, 2) + 'finish_hour_arr min');

        number_of_hours = finish_hour_arr.slice(0, 1) - start_hour_arr.slice(0, 1);
        number_of_min = finish_hour_arr.slice(1, 2) - start_hour_arr.slice(1, 2);

        console.log(number_of_hours + 'number_of_hours');
        console.log(number_of_min + 'number_of_min');

        // document.getElementById('number_of_hours').value = Math.abs(number_of_hours)
        let rate = document.getElementById('rate').value
        console.log(rate +
            'rate');
        rate_for_hours = eval(parseFloat(rate) * parseFloat(number_of_hours));
        console.log(rate_for_hours + 'rate for hour');
        rate_for_min = parseFloat(rate) * (parseFloat(number_of_min) / 60);
        console.log(rate_for_min + 'rate for min');
        average_time = rate_for_hours + rate_for_min;

        sum = (average_time);
        console.log(sum);
        document.getElementById('number_of_hours').value = Math.abs(number_of_hours)
        document.getElementById('sum').value = Math.abs(sum)
    }

    function get_sum() {

        let total_sum = document.getElementById('total_sum').value
        console.log(total_sum);
        let sum = document.getElementById('sum').value
        console.log(sum);

        total_total = (((parseFloat(total_sum) + parseFloat(sum))));
        console.log(total_total);

        document.getElementById('total_total').value = Math.abs(total_total)




    }

    function employee_fetch() {

            let keywords_search = document.getElementById('keywords_search').value
            console.log(keywords_search + 'keywords_search 1');

            $url_restaurant_id = $('#url_restaurant_id').val();
            console.log($url_restaurant_id + 'url_restaurant_id');
            $.ajax({
                type: "GET",
                url: '{{ url('employee-salary/fetch/' . $url_restaurant_id) }}',
                dataType: "json",
                success: function(response) {
                    arr = response.employee_salary;
                    response.employee_salary.forEach(item => {
                        item_id = item.id
                        console.log(keywords_search + 'keywords_search 2' + item_id + 'item_id 2');

                        if (item.id == keywords_search) {
                            document.getElementById('rate').value = ("")
                            console.log(item.name + ' item.name ');
                            console.log(item.rate + ' item.rate ');
                            document.getElementById('rate').value = Math.abs(item.rate)
                        }

                    });
                }
            });
        
        setTimeout(get_number_of_hours, 8000)
    }
</script>
