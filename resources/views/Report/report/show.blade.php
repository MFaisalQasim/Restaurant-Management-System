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

@push('css')
    <link href="{{ asset('plugins/components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="container-fluid" onload="report_default_fetch();">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Report
                    </h3>
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
                                                onchange="report_fetch()" class="form-control input_border from">
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="form-control" for="">To</label>
                                            <input type="date" name="to" placeholder="Date" id="to"
                                                onchange="report_fetch()" value="<?php echo $today; ?>"
                                                class="form-control input_border">
                                            <input type="hidden" name="url_restaurant_id"
                                                id="url_restaurant_id"value="{{ $url_restaurant_id }}">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-hover table-responsive-sm">
                        <thead>
                            <tr>
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
                                <th>Cash</th>
                                <th>Bank Cash Total</th>
                                <th>Status</th>
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

    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
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
            report_status_fetch();
        });

        function report_fetch() {
            $from_date = $('#from').val();
            $to_date = $('#to').val();
            console.log($from_date + 'from_date');
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
                            console.log(item.date + 'item.date');
                            console.log($to_date + 'to_date');
                            console.log($from_date + 'from_date');

                            if (item.date >= $from_date & item.date <= $to_date) {
                                console.log(arr.length + ' if if');
                                status = item.cash - item.bank_cash_total
                                Compliant_status = (status <= -5 || status >= 5) ? "InCompliant = " +
                                    item.status :
                                    "Compliant = " + item.status;
                                item_created_at = item.created_at.slice(0, 9)
                                console.log(Compliant_status + 'Compliant_status');

                                $('tbody').append(
                                    '<tr class="tr_remove" >\
                                                                                <td>' + item_created_at + '</td>\
                                                                                    <td>' + item.total_income + '</td>\
                                                                                    <td>' + item.card_transactions + '</td>\
                                                                                    <td>' + item.canceled_sale + '</td>\
                                                                                    <td>' + item.UBER + '</td>\
                                                                                    <td>' + item.BOLT + '</td>\
                                                                                    <td>' + item.WOLT + '</td>\
                                                                                    <td>' + item.PYSZNE + '</td>\
                                                                                    <td>' + item.GLOVO + '</td>\
                                                                                    <td>' + item.supplier_cash + '</td>\
                                                                                    <td>' + item.cash + '</td>\
                                                                                    <td>' + item.bank_cash_total + '</td>\
                                                                                    <td>' + Compliant_status + '</td>\
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
                            console.log(item.date.slice(0, 7) + 'item.date.slice(0, 7');
                            if (item.date.slice(0, 7) == $this_previous_month) {
                                console.log(arr.length + ' else if');
                                status = item.cash - item.bank_cash_total
                                Compliant_status = (status <= -5 || status >= 5) ? "InCompliant = " +
                                    item.status :
                                    "Compliant = " + item.status;
                                item_created_at = item.created_at.slice(0, 10)
                                $('tbody').append(
                                    '<tr class="tr_remove" >\
                                                                                <td>' + item_created_at + '</td>\
                                                                                    <td>' + item.total_income + '</td>\
                                                                                    <td>' + item.card_transactions + '</td>\
                                                                                    <td>' + item.canceled_sale + '</td>\
                                                                                    <td>' + item.UBER + '</td>\
                                                                                    <td>' + item.BOLT + '</td>\
                                                                                    <td>' + item.WOLT + '</td>\
                                                                                    <td>' + item.PYSZNE + '</td>\
                                                                                    <td>' + item.GLOVO + '</td>\
                                                                                    <td>' + item.supplier_cash + '</td>\
                                                                                    <td>' + item.cash + '</td>\
                                                                                    <td>' + item.bank_cash_total + '</td>\
                                                                                    <td>' + Compliant_status + '</td>\
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
