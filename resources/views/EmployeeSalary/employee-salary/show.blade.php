@extends('layouts.master')
<?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$tmp = explode('/', $url);
$url_restaurant_id = intval(end($tmp));
$sum = 0;

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Employee
                        {{-- {{ $employee->id }} --}}
                    </h3>
                    {{-- @can('view-' . str_slug('EmployeeSalary'))
                        <a class="btn btn-success pull-right" href="{{ url('/employee-salary') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i>View Salary</a>
                    @endcan --}}
                    <div class="clearfix"></div>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 mx-auto p-2">
                                    {{-- <form action="{{ url('safe/generate') . '/' . $url_restaurant_id }}" method="post" --}}
                                    {{-- @csrf --}}

                                    <div class=" d-flex " style="justify-content: space-around;">
                                        <div class="form-group d-flex">
                                            <label class="form-control" for="">From</label>
                                            <input type="date" name="from" placeholder="Date" id="from"
                                                onchange="salary_fetch()" class="form-control input_border from"
                                                data-id="2">
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="form-control" for="">To</label>
                                            <input type="date" name="to" placeholder="Date" id="to"
                                                onchange="salary_fetch()" value="<?php echo $today; ?>"
                                                class="form-control input_border">
                                            <input type="hidden" name="url_restaurant_id"
                                                id="url_restaurant_id"value="{{ $url_restaurant_id }}">
                                        </div>

                                        <div class="form-group d-flex">
                                            <style>
                                                .red_bold_text {
                                                    color: red;
                                                    font-size: 12px;
                                                    font-weight: bolder
                                                }
                                            </style>
                                            @if (auth()->user()->hasRole('admin') ||
                                                auth()->user()->hasRole('developer'))
                                                <label class="form-control red_bold_text" for="">The sum for the
                                                    Selected Period: <label for="" id="selected_period_sum"></label>
                                                    {{-- <input type="text"> --}}
                                                    {{-- {{ number_format($salary_sum, 2, '.', ',') }} --}}
                                                </label>
                                            @endif
                                        </div>
                                        <div class="form-group d-flex">
                                            <select class="this_previous_month form-control input_border"
                                                name="this_previous_month" id="this_previous_month"
                                                onchange="salary_status_fetch()">
                                                <option value="{{ date('Y-m') }}">This Month</option>
                                                <option value="{{ date('Y-m', strtotime(' -1 month')) }}">Previous Month
                                                </option>
                                            </select>
                                        </div>
                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @isset($total) --}}
                    {{-- <h4 class="text-primary mt-4 mb-2 font-weight-bold">
                            Report from {{ $startDate }} to {{ $endDate }}
                        </h4> --}}
                    <table class="table table-hover table-responsive-sm">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th> Salary sum </th>
                                <th> Hours sum </th>
                                <th> Bonus sum </th>
                                <th> Total salary with bonus </th>
                                <th> Average for the hour </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    {{-- <p class="text-danger text-center font-weight-bold">
                            <span class="border border-danger p-2">
                                Total : {{ $total }} DH
                                Total : {{ $report->bank_cash_total }} DH
                            </span>
                        </p> --}}
                    {{-- @endisset --}}
                    {{-- <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $employee->id }}</td>
                                </tr>
                                <tr>
                                    <th> Name </th>
                                    <td> {{ $employee->name }} </td>
                                </tr>
                                <tr>
                                    <th> Date Of Employment </th>
                                    <td> {{ $employee->date_of_employment }} </td>
                                </tr>
                                <tr>
                                    <th> End Of Work Date </th>
                                    <td> {{ $employee->end_of_work_date }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        let item_total_sum = 0;
        i = 0;
        j = 0;
        arr = [];
        arr_j = [];
        $(document).ready(function() {
            salary_status_fetch();
        });

        function salary_fetch() {
            $from_date = $('#from').val();
            $to_date = $('#to').val();
            console.log($from_date);
            console.log($to_date);

            $url_restaurant_id = $('#url_restaurant_id').val();
            console.log($url_restaurant_id);
            $.ajax({
                type: "GET",
                url: '{{ url('employee-salary/fetch/' . $url_restaurant_id) }}',
                dataType: "json",
                success: function(response) {
                    arr = response.employee_salary;
                    $('tbody').find('tr').remove()
                    response.employee_salary.forEach(item => {
                        if (item.restaurant_id == $url_restaurant_id) {
                            console.log(arr.length + ' if');
                            if (item.date >= $from_date & item.date <= $to_date) {
                                console.log(arr.length + ' if if');
                                $('tbody').append(
                                    '<tr class="tr_remove" >\
                                                    <td>' + item.name + '</td>\
                                                    <td>' + item.sum + '</td>\
                                                    <td>' + item.number_of_hours + '</td>\
                                                    <td>' + item.bonus_sum + '</td>\
                                                    <td>' + item.total_sum + '</td>\
                                                    <td>' + item.rate + '</td>\
                                                </tr>'
                                )
                                arr_j[j] = item.total_sum
                                console.log(arr_j[j] + 'arr[j] 2');
                                j++;
                            }
                        }
                    });
                    console.log(arr_j.reduce((a, b) => a + b, 0) + ' arr.reduce((a, b) => a + b, 0)');
                    $selected_period_sum = arr_j.reduce((a, b) => a + b, 0);
                    console.log($selected_period_sum.toFixed(3) + 'selected_period_sum 2');
                    $('#selected_period_sum').html($selected_period_sum.toFixed(3));
                    console.log($selected_period_sum.toFixed(3) + 'selected_period_sum 3');
                    
        arr_j = [];
                }
            });

        }

        function salary_status_fetch() {
            $this_previous_month = $('#this_previous_month').val();
            console.log($this_previous_month);

            $url_restaurant_id = $('#url_restaurant_id').val();
            console.log($url_restaurant_id);
            $.ajax({
                type: "GET",
                url: '{{ url('employee-salary/fetch/' . $url_restaurant_id) }}',
                dataType: "json",
                success: function(response) {
                    arr = response.employee_salary;
                    $('tbody').find('tr').remove()
                    response.employee_salary.forEach(item => {
                        if (item.restaurant_id == $url_restaurant_id) {
                            console.log(arr.length + ' if');
                            if (item.date.slice(0, 7) == $this_previous_month)  {
                                console.log(arr.length + ' if if');
                                $('tbody').append(
                                    '<tr class="tr_remove" >\
                                                    <td>' + item.name + '</td>\
                                                    <td>' + item.sum + '</td>\
                                                    <td>' + item.number_of_hours + '</td>\
                                                    <td>' + item.bonus_sum + '</td>\
                                                    <td>' + item.total_sum + '</td>\
                                                    <td>' + item.rate + '</td>\
                                        </tr>'
                                )
                                arr_j[j] = item.total_sum
                                console.log(arr_j[j] + 'arr[j] 2');
                                j++;
                            }
                        }
                    });
                    console.log(arr_j.reduce((a, b) => a + b, 0) + ' arr.reduce((a, b) => a + b, 0)');
                    $selected_period_sum = arr_j.reduce((a, b) => a + b, 0);
                    console.log($selected_period_sum.toFixed(3) + 'selected_period_sum 2');
                    $('#selected_period_sum').html($selected_period_sum.toFixed(3));
                    console.log($selected_period_sum.toFixed(3) + 'selected_period_sum 3');
                    
        arr_j = [];
                }
            });
        }
        // })
    </script>
@endpush
