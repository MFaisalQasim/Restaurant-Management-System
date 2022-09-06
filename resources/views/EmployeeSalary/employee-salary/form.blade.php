

    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
    {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6" style="display: flex   ;  justify-content: space-between;">
        <div>
            <input type="date" name="date" placeholder="Date" id="date" onload="getDate()" placeholder="Date"
                value="<?php echo $today; ?>" class="form-control">
        </div>
        <div class="topnav search_icon_div " style="display: flex;
                ">
            <button onclick="employee_fetch()" class="search_button">
                {{-- <div  class="search_button button"> --}}
                <img src="{{ asset('assets/images/search_icon_bar.png') }}" alt="">
                {{-- </div> --}}
            </button>
            {{-- <input type="text" name="keywords_search"
            id="keywords_search" value=""> --}}
            <input class="form-control mr-sm-2 keywords_search" id="keywords_search" name="keywords_search"
                type="search" onkeyup="employee_fetch()" value="" placeholder="Employee" aria-label="Search">
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
            onkeyup="get_number_of_hours()" required>
        {!! $errors->first('rate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{-- <div class="form-group {{ $errors->has('number_of_hours') ? 'has-error' : '' }}">
    {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6"> --}}
<input class="form-control" id="number_of_hours" type="hidden" value='' name="number_of_hours"
    placeholder='value of "Number Of Hours" ' readonly>
{!! $errors->first('number_of_hours', '<p class="help-block">:message</p>') !!}
{{-- </div>
</div> --}}

<div class="form-group {{ $errors->has('sum') ? 'has-error' : '' }}">
    {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input class="form-control" id="sum" type="text" value='' placeholder=' value of "Sum" '
            readonly>
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
                    onkeyup="get_sum()">
                {!! $errors->first('bonus_sum', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('extra_bonus') ? 'has-error' : '' }}">
    {!! Form::label('extra_bonus', ' ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input class="form-control" id="total_total" type="text" name="sum" value=''
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
{{-- <input type="hidden" name="url_restaurant_id" id="url_restaurant_id"value="{{ $url_restaurant_id }}"> --}}
</div>

<script>
    function get_number_of_hours() {
        let start_hour = document.getElementById('start_hour').value;
        let finish_hour = document.getElementById('finish_hour').value;
        console.log(start_hour);
        console.log(finish_hour);

        number_of_hours = (eval((parseFloat(finish_hour) - parseFloat(start_hour))));
        console.log(eval((parseFloat(start_hour) - parseFloat(finish_hour))));
        console.log(number_of_hours +
            'number_of_hours');
        document.getElementById('number_of_hours').value = Math.abs(number_of_hours)

        console.log(number_of_hours +
            'number_of_hours');
        let rate = document.getElementById('rate').value
        console.log(rate +
            'rate');
        sum = (((parseFloat(rate) * parseFloat(number_of_hours))));
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

    // function employee_fetch() {
    //     let keywords_search = document.getElementById('keywords_search').value
    //     // $keywords_search = $('#keywords_search').val();
    //     // $keywords_search = $(this).attr();
    //     // $keywords_search = $('#keywords_search').html();
    //     // $keywords_search = $('#keywords_search');
    //     console.log($keywords_search = 'keywords_search');
    //     console.log($keywords_search = 'keywords_searchattr');
    //     console.log($keywords_search = 'keywords_searchhtml');

    //     $url_restaurant_id = $('#url_restaurant_id').val();
    //     console.log($url_restaurant_id + 'url_restaurant_id');
    //     $.ajax({
    //         type: "GET",
    //         url: '{{ url('employee-salary/fetch/' . $url_restaurant_id) }}',
    //         dataType: "json",
    //         success: function(response) {
    //             arr = response.employee_salary;
    //             // $('tbody').find('tr').remove()
    //             response.employee_salary.forEach(item => {
    //                 console.log($keywords_search + 'keywords_search');
    //                 if (item.restaurant_id == $url_restaurant_id) {
    //                     // if ( $keywords_search ==  item.name) {
    //                     if (item.name == $keywords_search) {
    //                         console.log(item.name);
    //                         console.log(item.name + ' item.name ');
    //                         console.log(arr.length + ' else if');
    //                     }
    //                 }

    //             });
    //         }
    //     });

    // }
</script>
