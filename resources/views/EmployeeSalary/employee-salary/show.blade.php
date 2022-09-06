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
                    {{-- <h3 class="box-title pull-left">Employee {{ $employee->id }}</h3> --}}
                    @can('view-' . str_slug('EmployeeSalary'))
                        <a class="btn btn-success pull-right" href="{{ url('/employee-salary') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i>View Salary</a>
                    @endcan
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
                                                    Selected Period: 34,00.0
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
                                {{-- <th> Start Hours </th>
                                    <th> Finish Hours </th> --}}
                                <th> Salary sum </th>
                                <th> Hours sum </th>
                                <th> Average for the hour </th>
                                <th> Bonus sum </th>
                                <th> Total salary with bonus </th>

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
    <script>
        // $(document).ready( function () {
        // salary_fetch();


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
                    // console.log(response.safe);
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
                                                            <td>' + item.bonus_sum + '</td>\
                                                            <td>' + item.bonus_sum + '</td>\
                                                            <td>' + (((item.finish_hour) - (item.start_hour))) + '</td>\
                                                            <td>' + item.bonus_sum + '</td>\
                                                            <td>' + item.rate +
                                    '</td>\
                                                                                                                                                     </tr>'
                                )

                            }

                        }

                    });
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
                        
                        // let rate = ((strtotime(item.finish_hour) - strtotime(item.start_hour)) / 3600) * item.rate
                        // let rate = ((Date.parse(item.finish_hour,"MM/dd/yyyy") - Date.parse(item.start,"MM/dd/yyyy")) / 3600) * item.rate;

                        // console.log(rate + 'rate');

                        if (item.restaurant_id == $url_restaurant_id) {
                            console.log($this_previous_month + 'this_previous_month');
                            item_date = item.date.slice(0, 7)
                            console.log(item_date);
                            if (item.date.slice(0, 7) == $this_previous_month) {
                                console.log(arr.length + ' else if');
                                

                                $('tbody').append(
                                    '<tr class="tr_remove" >\
                                                            <td>' + item.name + '</td>\
                                                            <td>' + item.bonus_sum + '</td>\
                                                            <td>' + item.bonus_sum + '</td>\
                                                            <td>' + item.bonus_sum + '</td>\
                                                            <td>' + item.bonus_sum + '</td>\
                                                            <td>' + item.rate +
                                    '</td>\
                                                                                                                                                     </tr>'
                                )
                            }
                        }

                    });
                }
            });

        }
        // })
    </script>
@endpush
