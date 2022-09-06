@extends('layouts.master')
{{-- @extends('layouts.design') --}}
<?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$tmp = explode('/', $url);
$url_restaurant_id = intval(end($tmp));
$sum = 0;

$month = date('m');
// $this_previous_month = date('Y-m');
// $this_previous_month = date('Y-m', strtotime(' -1 month'));
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
                    {{-- <h3 class="box-title pull-left">Report {{ $report->id }}</h3> --}}
                    {{-- @can('view-' . str_slug('Report'))
                        <a class="btn btn-success pull-right" href="{{ url('/report') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan --}}
                    @can('add-' . str_slug('Report'))
                        <a class="btn btn-success pull-right" href="{{ url('report/create/' . $url_restaurant_id) }}"><i
                                class="icon-plus"></i> Add
                            Report</a>
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
                                                onchange="report_fetch()" class="form-control input_border from"
                                                data-id="2">
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="form-control" for="">To</label>
                                            <input type="date" name="to" placeholder="Date" id="to"
                                                onchange="report_fetch()" value="<?php echo $today; ?>"
                                                class="form-control input_border">
                                            <input type="hidden" name="url_restaurant_id" id="url_restaurant_id"value="{{ $url_restaurant_id }}">
                                        </div>
                                        <div class="form-group d-flex">
                                            <select class="this_previous_month form-control input_border"
                                                name="this_previous_month" id="this_previous_month"
                                                onchange="report_status_fetch()">
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
                    {{-- <h4 class="text-primary mt-4 mb-2 font-weight-bold"> Report from {{ $startDate }} to
                            {{ $endDate }}

                        </h4> --}}
                    <table class="table table-hover table-responsive-sm">
                        <thead>
                            <tr>
                                {{-- <th>Id</th> --}}
                                {{-- <th>Menus</th> --}}
                                <th>Date</th>
                                <th>Total income</th>
                                <th>Card Transactions</th>
                                <th>Canceled Sale</th>

                                @foreach ($supplier as $item)
                                    <th>
                                        {{ $item->name }}
                                    </th>
                                @endforeach
                                <th>Supplier Cash</th>
                                <th>Bank Cash Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($report as $report)
                                    <tr>
                                        <td>
                                            {{ $report->created_at->format('Y-m-d') }}
                                        </td>
                                        <td>
                                            {{ $report->total_income }}
                                        </td>
                                        <td>
                                            {{ $report->card_transactions }}
                                        </td>
                                        <td>
                                            {{ $report->canceled_sale }}
                                        </td>
                                        <td>
                                            {{ $report->supplier_cash }}
                                        </td>
                                        @foreach ($supplier as $item)
                                            <td>
                                                {{ $item->sum }}
                                            </td>
                                        @endforeach
                                        <td>
                                            {{ $report->bank_cash_total }}
                                        </td>
                                        <td>
                                            {{ $report->bank_cash_total - $report->cash >= -5
                                                ? 'Compliant =' . ($report->bank_cash_total - $report->cash)
                                                : 'Incosistent =' . ($report->bank_cash_total - $report->cash) }}
                                        </td>
                                        @if (auth()->user()->hasRole('admin') ||
    auth()->user()->hasRole('developer'))
                                            <td>
                                                {{ $report->restaurant_id }}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach --}}
                        </tbody>
                    </table>
                    <ul>

                    </ul>
                    {{-- <p class="text-danger text-center font-weight-bold">
                            <span class="border border-danger p-2">
                                Total : {{ $total }} DH
                                Total : {{ $report->bank_cash_total }} DH
                            </span>
                        </p> --}}
                    {{-- <form action="{{ route('report.export') }}" method="post">
                            @csrf

                            @if (auth()->user()->hasRole('admin') ||
    auth()->user()->hasRole('developer'))
                                <div class="form-group">
                                    <input type="hidden" name="from" value="{{ $startDate }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="to" value="{{ $endDate }}" class="form-control">
                                </div>
                            @endif --}}
                    {{-- <div class="form-group">
                                <button class="btn btn-danger">
                                    Generate the Excel Report
                                </button>
                            </div> --}}
                    {{-- </form> --}}
                    {{-- @endisset --}}
                    {{-- <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $report->id }}</td>
                            </tr>
                            <tr><th> Total Income </th><td> {{ $report->total_income }} </td></tr><tr><th> Card Transactions </th><td> {{ $report->card_transactions }} </td></tr><tr><th> Canceled Sale </th><td> {{ $report->canceled_sale }} </td></tr>
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
        function report_fetch() {
            $from_date = $('#from').val();
            $to_date = $('#to').val();
            console.log($from_date = 'from_date');
            console.log($to_date + 'to_date');

            $url_restaurant_id = $('#url_restaurant_id').val();
            console.log($url_restaurant_id);
            $.ajax({
                type: "GET",
                url: '{{ url('report/fetch/' . $url_restaurant_id) }}',
                dataType: "json",
                success: function(response) {
                    arr = response.report;
                            console.log(arr + ' arr');
                    $('tbody').find('tr').remove()
                    response.report.forEach(item => {
                        if (item.restaurant_id == $url_restaurant_id) {
                            console.log(arr.length + ' if');
                            console.log($this_previous_month + 'not month');

                            if (item.created_at.slice(0, 7) >= $from_date & item.created_at.slice(0,
                                    7) <= $to_date) {
                                console.log(arr.length + ' if if');

                                $('tbody').append(
                                    '<tr class="tr_remove" >\
                                                <td>' + item.date + '</td>\
                                                    <td>' + item.total_income + '</td>\
                                                    <td>' + item.card_transactions + '</td>\
                                                    <td>' + item.canceled_sale + '</td>\
                                                    <td>' + item.UBER + '</td>\
                                                    <td>' + item.BOLT + '</td>\
                                                    <td>' + item.WOLT + '</td>\
                                                    <td>' + item.PYSZNE + '</td>\
                                                    <td>' + item.GLOVO + '</td>\
                                                    <td>' + item.supplier_cash + '</td>\
                                                    <td>' + item.bank_cash_total + '</td>\
                                                    <td>' + item.bank_cash_total + '</td>\
                                                </tr>'
                                )





                            }

                        }

                    });
                }
            });
        }

        function report_status_fetch() {
            $this_previous_month = $('#this_previous_month').val();
            console.log($this_previous_month);
            $url_restaurant_id = $('#url_restaurant_id').val();
            console.log($url_restaurant_id);
            $.ajax({
                type: "GET",
                url: '{{ url('report/fetch/' . $url_restaurant_id) }}',
                dataType: "json",
                success: function(response) {
                    arr = response.report;
                    $('tbody').find('tr').remove()
                    response.report.forEach(item => {
                        if (item.restaurant_id == $url_restaurant_id) {
                            console.log($this_previous_month + 'this_previous_month');
                            item_date = item.created_at.slice(0, 7)
                            console.log(item_date);
                            if (item.date.slice(0, 7) == $this_previous_month) {
                                console.log(arr.length + ' else if');
                                $('tbody').append(
                                    '<tr class="tr_remove" >\
                                                <td>' + item.date + '</td>\
                                                    <td>' + item.total_income + '</td>\
                                                    <td>' + item.card_transactions + '</td>\
                                                    <td>' + item.canceled_sale + '</td>\
                                                    <td>' + item.UBER + '</td>\
                                                    <td>' + item.BOLT + '</td>\
                                                    <td>' + item.WOLT + '</td>\
                                                    <td>' + item.PYSZNE + '</td>\
                                                    <td>' + item.GLOVO + '</td>\
                                                    <td>' + item.supplier_cash + '</td>\
                                                    <td>' + item.bank_cash_total + '</td>\
                                                    <td>' + item.bank_cash_total + '</td>\
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
