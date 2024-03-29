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

$item_file = null;
$today = $year . '-' . $month . '-' . $day;
    // $records = "download";
?>
@section('content')
    <style>
        /* .download_file:focus,
        .download_file:hover, */
        .download_file:visited 
        {
            color: red !important;
        }
        /* .not_download_file:focus,
        .download_file:hover, */
        .download_file:visited
         {
            color: green !important;
        }
    </style>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Expense
                        {{-- {{ $expense->id }} --}}
                    </h3>
                    {{-- @can('view-' . str_slug('Expenses'))
                        <a class="btn btn-success pull-right" href="{{ url('/expenses') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan 
                    @can('add-' . str_slug('expenses'))
                        <a class="btn btn-success pull-right" href="{{ url('/expenses/create') }}"><i class="icon-plus"></i> Add
                            Expenses</a>
                    @endcan --}}
                    <div class="clearfix"></div>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-sm-12 mx-auto p-2">
                                    {{-- <form action="{{ url('safe/generate') . '/' . $url_restaurant_id }}" method="post" --}}
                                    {{-- @csrf --}}
                                    <div class=" d-flex " style="justify-content: space-around;">
                                        <div class="form-group d-flex">
                                            <label class="form-control" for="">From</label>
                                            <input type="date" name="from" placeholder="Date" id="from"
                                                onchange="expenses_fetch()" class="form-control input_border from"
                                                data-id="2">
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="form-control" for="">To</label>
                                            <input type="date" name="to" placeholder="Date" id="to"
                                                onchange="expenses_fetch()" value="<?php echo $today; ?>"
                                                class="form-control input_border">
                                            <input type="hidden" name="url_restaurant_id"
                                                id="url_restaurant_id"value="{{ $url_restaurant_id }}">
                                        </div>
                                        <div class="form-group d-flex">
                                            <select class="this_previous_month form-control input_border"
                                                name="this_previous_month" id="this_previous_month"
                                                onchange="expenses_status_fetch()">
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
                    {{-- @dd($expensesFile) --}}
                    {{-- @isset($total) --}}
                    {{-- <h4 class="text-primary mt-4 mb-2 font-weight-bold">
                            Report from {{ $startDate }} to {{ $endDate }}
                        </h4> --}}
                    <table class="table table-hover table-responsive-sm">
                        <thead>
                            <tr>
                                <th> Date </th>
                                <th> Full Name </th>
                                <th> Sum </th>
                                <th> Expense Name </th>
                                <th> File </th>
                                <th> Download </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($expenses as $item)
                                    <tr>
                                        <td> {{ $item->date_of_expense }} </td>
                                        <td> {{ $item->for_whom }} </td>
                                        <td> {{ $item->sum }} </td>
                                        <td>
                                            @foreach ($expensesFile as $file)
                                                @if ($item->id == $file->expenses_id)
                                                    <a href="{{ $file->file }}">Download!</a>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td> {{ $item->sum }} </td>
                                    </tr>
                                @endforeach --}}
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
                                    <td>{{ $expense->id }}</td>
                                </tr>
                                <tr>
                                    <th> For Whom </th>
                                    <td> {{ $expense->for_whom }} </td>
                                </tr>
                                <tr>
                                    <th> Sum </th>
                                    <td> {{ $expense->sum }} </td>
                                </tr>
                                <tr>
                                    <th> Date </th>
                                    <td> {{ $expense->date_of_expense }} </td>
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
    {{-- <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script> --}}
    <script type="text/javascript">
        let records = "not download";
        $item_file = null;
                                    item_file = null;
        $(document).ready(function() {
            
            expenses_status_fetch();
        });

        function expenses_fetch() {

            var item_file
            let item_expenses_id;
            $from_date = $('#from').val();
            $to_date = $('#to').val();
            $this_previous_month = $('#month').val();
            console.log($from_date);
            console.log($to_date);
            console.log($this_previous_month);

            $url_restaurant_id = $('#url_restaurant_id').val();
            console.log($url_restaurant_id);
            $.ajax({
                type: "GET",
                url: '{{ url('expenses/fetch/' . $url_restaurant_id) }}',
                dataType: "json",
                success: function(response) {

                    arr = response.expenses;

                    $('tbody').find('tr').remove()
                    response.expenses.forEach(item => {
                        if (item.restaurant_id == $url_restaurant_id) {
                            console.log(arr.length + ' if');
                            if (item.date_of_expense >= $from_date & item.date_of_expense <=
                                $to_date) {
                                console.log(arr.length + ' if if');

                                response.expenseFile.forEach(values => {
                                    item_id = item.id;
                                    expenses_item_id = values.expenses_id;

                                    if (expenses_item_id == item_id) {
                                        console.log(expenses_item_id + 'expenses_item_id' +
                                            item_id + 'id');
                                        if (expenses_item_id != undefined & expenses_item_id !=
                                            "undefined") {
                                            item_file = values.file;
                                            console.log(item_file + "item_file");
                                        }
                                    }
                                });
                                console.log(item_file + 'item_file');
                                        //             <td><a class="download_file" href="' + '/expenses/update/' + item.id +
                                        // '" > ||  Check  ||</a></td>\

                                if (item_file != null) {
                                    $('tbody').append(
                                        '<tr class="tr_remove" >\
                                                    <td>' + item.date_of_expense + '</td>\
                                                    <td>' + item.for_whom + '</td>\
                                                    <td>' + item.sum + '</td>\
                                                    <td>' + item.name + '</td>\
                                                    <td> <a class="download_file" href="' + item_file + '" download >   Download File  </a></td>\
                                                   <td><form action="' + '/expenses/update/' + item.id +'"><button> <input type="checkbox" class="btn" '+(records == item.status ? 'not_checked'  : 'checked' ) +' > click to ' +item.status+'  </button></td>\
                                                <td> <a class="download_file" href="' +
                                                '/expenses/edit/' + item.id +
                                                '" > ||  Edit  ||</a><a class="download_file" href="' +
                                                '/expenses/delete/' + item.id +
                                                '" >  || Delete || </a></td>\
                                                </tr>'
                                    )
                                } else {
                                    $('tbody').append(
                                        '<tr class="tr_remove" >\
                                                    <td>' + item.date_of_expense + '</td>\
                                                    <td>' + item.for_whom + '</td>\
                                                    <td>' + item.sum + '</td>\
                                                    <td>' + item.name + '</td>\
                                                    <td>' + "No file" + '</td>\
                                                    <td>' + "Disabled" + '</td>\
                                                <td> <a class="download_file" href="' +
                                                '/expenses/edit/' + item.id +
                                                '" > ||  Edit  ||</a><a class="download_file" href="' +
                                                '/expenses/delete/' + item.id +
                                                '" >  || Delete || </a></td>\
                                                </tr>'
                                    )
                                }
                                item_file = null;

                            }

                        }

                    });
                }
            });

        }

        function expenses_status_fetch() {
            $this_previous_month = $('#this_previous_month').val();
            console.log($this_previous_month);

            $url_restaurant_id = $('#url_restaurant_id').val();
            console.log($url_restaurant_id);
            $.ajax({
                type: "GET",
                url: '{{ url('expenses/fetch/' . $url_restaurant_id) }}',
                dataType: "json",
                success: function(response) {
                    arr = response.expenses;
                    $('tbody').find('tr').remove()
                    response.expenses.forEach(item => {
                        if (item.restaurant_id == $url_restaurant_id) {
                            console.log(arr.length + ' if');
                            console.log($this_previous_month + 'not this_previous_month'); {
                                console.log($this_previous_month + 'this_previous_month');
                                console.log(item.date_of_expense + 'item.date_of_expense');
                                item_date = item.date_of_expense;
                                console.log(item_date + 'item_date');

                                if (item_date.slice(0, 7) == $this_previous_month) {
                                    console.log($this_previous_month + 'date match');
                                    console.log(arr.length + ' if if');

                                    response.expenseFile.forEach(values => {

                                        item_id = item.id;
                                        expenses_item_id = values.expenses_id;

                                        console.log(expenses_item_id + 'expenses_item_id' +
                                            item_id + 'item_id');

                                        if (expenses_item_id == item_id) {
                                            console.log(expenses_item_id + 'expenses_item_id' +
                                                item_id + 'item_id');
                                            if (expenses_item_id != undefined &
                                                expenses_item_id !="undefined") {
                                                item_file = values.file;
                                                console.log(item_file + "item_file");
                                            } else {
                                                item_file = null;
                                                console.log("is null");
                                            }
                                        }
                                    });
                                    console.log(item_file + 'item_file');
                                    console.log(records + '$records');
                                    console.log(item.status + 'item.status');
                                    if (item_file != null) {
                                        
                                        $item_file = item_file;
                                        console.log(item_file + "item_file");
                                        console.log($item_file + "$item_file");
                                        $('tbody').append(
                                            '<tr class="tr_remove" >\
                                                    <td>' + item.date_of_expense + '</td>\
                                                    <td>' + item.for_whom + '</td>\
                                                    <td>' + item.sum + '</td>\
                                                    <td>' + item.name + '</td>\
                                                    <td> <a class="download_file" href="' + item_file + '" download >   Download File  </a></td>\
                                                   <td><form action="' + '/expenses/update/' + item.id +'"><button> <input type="checkbox" class="btn" '+(records == item.status ? ''  : 'checked' ) +' > click to ' +item.status+'  </button></td>\
                                                <td> <a class="download_file" href="' +
                                                '/expenses/edit/' + item.id +
                                                '" > ||  Edit  ||</a><a class="download_file" href="' +
                                                '/expenses/delete/' + item.id +
                                                '" >  || Delete || </a></td>\
                                                </tr>'
                                        )
                                        // ../../../../MainContent/public/
                                    } else {
                                        $('tbody').append(
                                            '<tr class="tr_remove" >\
                                                    <td>' + item.date_of_expense + '</td>\
                                                    <td>' + item.for_whom + '</td>\
                                                    <td>' + item.sum + '</td>\
                                                    <td>' + item.name + '</td>\
                                                    <td>' + "No file" + '</td>\
                                                    <td>' + "Disabled" + '</td>\
                                                <td> <a class="download_file" href="' +
                                                '/expenses/edit/' + item.id +
                                                '" > ||  Edit  ||</a><a class="download_file" href="' +
                                                '/expenses/delete/' + item.id +
                                                '" >  || Delete || </a></td>\
                                                </tr>'
                                        )
                                    }
                                    item_file = null;
                                }
                            }
                        }
                    });
                }
            });

        }
    </script>
@endpush
