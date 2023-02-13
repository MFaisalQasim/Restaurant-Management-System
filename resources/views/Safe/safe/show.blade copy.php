@extends('layouts.master')
{{-- @extends('layouts.design') --}}

<?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$tmp = explode('/', $url);
$url_restaurant_id = intval(end($tmp));
$sum = 0;

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
$month = $month;
$year_month = $year . '-' . $month;
$safe_payment_sum;
?>

@push('css')
    <link href="{{ asset('plugins/components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Safe
                        {{-- {{ $url_restaurant_id }} --}}
                    </h3>
                    {{-- @can('view-' . str_slug('Safe'))
                        <a class="btn btn-success pull-right" href="{{ url('/safe') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan --}}
                    {{-- @can('add-' . str_slug('Safe'))
                        <a class="btn btn-success pull-right" href="{{ url('/safe') }}"><i class="icon-plus"></i> Add New
                            Safe
                        </a>
                    @endcan --}}
                    <div class="clearfix"></div>
                    <hr>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 mx-auto p-2">
                                    <div class=" d-flex " style="justify-content: space-around;">
                                        <div class="form-group d-flex">
                                            <label class="form-control" for="">From</label>
                                            <input type="date" name="from" placeholder="Date" id="from"
                                                onchange="safe_fetch()" class="form-control input_border from"
                                                data-id="2">
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="form-control" for="">To</label>
                                            <input type="date" name="to" placeholder="Date" id="to"
                                                onchange="safe_fetch()" value="<?php echo $today; ?>"
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
                                                <label class="form-control red_bold_text" for="">Currently In Safe :
                                                    {{ number_format($safe_payment_sum - $safe_paycheck_sum, 2, '.', ',') }}
                                                </label>
                                            @endif
                                            <input type="hidden" name="safe_sum" id="safe_sum"
                                                value="{{ $safe_sum }}">
                                            <input type="hidden" name="safe_payment_sum" id="safe_payment_sum"
                                                value="{{ $safe_payment_sum }}">
                                            <input type="hidden" name="safe_paycheck_sum" id="safe_paycheck_sum"
                                                value="{{ $safe_paycheck_sum }}">
                                        </div>
                                        <div class="form-group d-flex">
                                            <select class="this_previous_month form-control input_border"
                                                name="this_previous_month" id="this_previous_month"
                                                onchange="safe_status_fetch()">
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
                    <table class="table table-hover table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Employee Complete Name</th>
                                <th>Payment</th>
                                <th>Paycheck</th>
                                {{-- <th>Sum after transaction
                                </th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('js')
    <script src="{{ asset('plugins/components/toast-master/js/jquery.toast.js') }}"></script>

    <script src="{{ asset('plugins/components/datatables/jquery.dataTables.min.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {

            @if (\Session::has('message'))
                $.toast({
                    heading: 'Success!',
                    position: 'top-center',
                    text: '{{ session()->get('message') }}',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 6
                });
            @endif
        })

        $(function() {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>

    <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            safe_status_fetch();
        });
        $safe_sum = $('#safe_sum').val();
        console.log($safe_sum + 'safe_sum');
        total_sum = $safe_sum

        $safe_payment_sum = $('#safe_payment_sum').val();
        console.log($safe_payment_sum + 'safe_payment_sum');
        $safe_paycheck_sum = $('#safe_paycheck_sum').val();
        console.log($safe_paycheck_sum + 'safe_paycheck_sum');

        function safe_fetch() {
            $from_date = $('#from').val();
            $to_date = $('#to').val();
            console.log($from_date);
            console.log($to_date);

            $url_restaurant_id = $('#url_restaurant_id').val();
            console.log($url_restaurant_id + 'url_restaurant_id');


            // url_restaurant_id = $url_restaurant_id;
            // console.log($url_restaurant_id);
            // console.log(url_restaurant_id);

            $.ajax({
                type: "GET",
                url: '{{ url('safe/fetch/' . $url_restaurant_id) }}',
                dataType: "json",
                success: function(response) {
                    console.log(response.safe);
                    arr = response.safe;
                    $('tbody').find('tr').remove()
                    response.safe.forEach(item => {
                        if (item.restaurant_id == $url_restaurant_id) {
                            console.log(arr.length + ' if');
                            item_created_at = item.created_at.slice(0, 10)
                            if (item_created_at >= $from_date & item_created_at <= $to_date) {
                                console.log(arr.length + ' if if');
                                item_payment = (item.payment == null) ? "-" : item.payment;
                                console.log(item_payment + "item_payment");
                                item_paycheck = (item.paycheck == null) ? "-" : "-" + item.paycheck;
                                console.log(item_paycheck + "item_paycheck");
                                let Sum_after = (parseInt(total_sum) + (item.payment - item.paycheck))
                                
                                $('tbody').append(
                                    '<tr class="tr_remove" >\
                                        <td>' + item_created_at + '</td>\
                                        <td>' + item.employee_complete_name + '</td>\
                                        <td>' + item_payment + '</td>\
                                        <td>' + item_paycheck + '</td>\
                                        <td> <a class="download_file" href="' +
                                        '/safe/edit/' + item.id +
                                        '" > ||  Edit  ||</a><a class="download_file" href="' +
                                        '/safe/delete/' + item.id +
                                        '" >  || Delete || </a></td>\
                                    </tr>'
                                )

                            }

                        }

                    });
                }
            });

        }

        function safe_status_fetch() {
            $this_previous_month = $('#this_previous_month').val();
            console.log($this_previous_month + 'this_previous_month 1');

            $url_restaurant_id = $('#url_restaurant_id').val();
            console.log($url_restaurant_id + 'url_restaurant_id');

            $.ajax({
                type: "GET",
                url: '{{ url('safe/fetch/' . $url_restaurant_id) }}',
                dataType: "json",
                success: function(response) {
                    console.log(response.safe);
                    arr = response.safe;
                    $('tbody').find('tr').remove()
                    response.safe.forEach(item => {
                        if (item.restaurant_id == $url_restaurant_id) {
                            console.log(item.restaurant_id + 'item.restaurant_id 2');
                            console.log($url_restaurant_id + 'url_restaurant_id 2');
                            // item_date = item.date.slice(0,7);
                            // console.log(item_date + 'this_previous_month 2');
                            // console.log(item_date + 'date');

                            if (item.created_at.slice(0, 7) == $this_previous_month) {
                                console.log(arr.length + ' else if');
                                item_payment = (item.payment == null) ? "-" : item.payment;
                                console.log(item_payment + "item_payment");
                                item_paycheck = (item.paycheck == null) ? "-" : "-" + item.paycheck;
                                console.log(item_paycheck + "item_paycheck");
                                let Sum_after = (parseInt(total_sum) + (item.payment - item.paycheck))
                                item_created_at = item.created_at.slice(0, 10)
                                $('tbody').append(
                                    '<tr class="tr_remove" >\
                                        <td>' + item_created_at + '</td>\
                                        <td>' + item.employee_complete_name + '</td>\
                                        <td>' + item_payment + '</td>\
                                        <td>' + item_paycheck + '</td>\
                                        <td> <a class="download_file" href="' +
                                        '/safe/edit/' + item.id +
                                        '" > ||  Edit  ||</a><a class="download_file" href="' +
                                        '/safe/delete/' + item.id +
                                        '" >  || Delete || </a></td>\
                                    </tr>'
                                )

                            }

                        }

                    });
                }
            });

        }
    </script>
@endpush
