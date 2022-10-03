<div onload="employee_fetch()">
    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
        {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6" style="display: flex   ;  justify-content: space-between;">
            <div>
                <input type="date" name="date" placeholder="Date" id="date" onload="getDate()" placeholder="Date"
                    value="<?php echo $today; ?>" class="form-control">
            </div>
            <div class="topnav search_icon_div "
                style="display: flex;
                                                ">
                <label class="form-label mt-3" for="keywords_search">Employee : </label>
                @if (count($user) != 0)
                    <select class="select" data-mdb-filter="true" onchange="employee_fetch();" id="keywords_search"
                        name="keywords_search">
                        @foreach ($user as $item)
                            @if (!$item->hasRole('developer'))
                                @if ($item->restaurant_id == $employeesalary->restaurant_id)
                                    <option value="{{ $item->id }}">{{ $item->name . ' ' . $item->surname }}</option>
                                @endif
                            @endif
                            {{-- <input type="hidden" name="employee_name"
                                                                value="{{ $item->name }}"> --}}
                        @endforeach
                    </select>
                @else
                    <input name="employee_name" id="employee_name" type="text"
                        value="{{ auth()->user()->name . ' ' . auth()->user()->surname }}"
                        placeholder="Add Users to Restaurant to select one" readonly>
                @endif
            </div>

        </div>
        <input type="hidden" name="employee_name" id="employee_name">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('start_hour') ? 'has-error' : '' }} ">
        {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            <div class=" row ">
                {!! Form::label('', 'Start Hour', ['class' => 'col-2 control-label p-0 pt-2']) !!}
                <div class="col  pl-0 pr-0 ">
                    <input class="form-control" id="start_hour" type="time" name="start_hour" id=""
                        onchange="get_number_of_hours()" onkeyup="get_sum()" placeholder="Start Hour">
                    {!! $errors->first('start_hour', '<p class="help-block">:message</p>') !!}
                </div>
                {!! Form::label('', 'Finish Hour', ['class' => 'col-2 control-label p-0 pt-2']) !!}
                <div class="col  pl-0 pr-0 ">
                    <input class="form-control" id="finish_hour" type="time" name="finish_hour" id=""
                        onchange="get_number_of_hours()" onkeyup="get_sum()" placeholder="Finish Hour">
                    {!! $errors->first('finish_hour', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="form-group {{ $errors->has('rate') ? 'has-error' : '' }}">
        {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            <input class="form-control" type="number" name="rate" id="rate" placeholder="Rate"
                onkeyup="get_number_of_hours()" onchange="get_number_of_hours()" required>
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
                    <input class="form-control" id="total_sum" type="float" name="bonus_sum"
                        placeholder="Bonus Amount" onkeyup="get_sum()">
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

</div>
@push('js')
    <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
        $(document).ready(function() {
            employee_fetch();
        });

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
            if (number_of_min < 0) {
                number_of_min = 60 + number_of_min
                console.log(number_of_min + '(60 + number_of_min');
            }
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
            console.log(sum + "sum");
            hours = number_of_hours + '.' + number_of_min;
            console.log(hours + "hours");
            document.getElementById('number_of_hours').value = Math.abs(hours)
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
                url: '{{ url('employee-salary-user/fetch/' . $url_restaurant_id) }}',
                dataType: "json",
                success: function(response) {
                    arr = response.users;
                    response.users.forEach(item => {
                        item_id = item.id
                        console.log(keywords_search + 'keywords_search 2' + item_id + 'item_id 2');

                        if (item.id == keywords_search) {
                            document.getElementById('rate').value = ("")
                            console.log(item.name + ' item.name ');
                            item_name = item.name + " " + item.surname
                            console.log(item_name + 'name');
                            document.getElementById('employee_name').value = (item_name)
                            console.log(item.salary + ' item.salary ');
                            document.getElementById('rate').value = Math.abs(item.salary)

                        }

                    });
                }
            });
        }
    </script>
@endpush
