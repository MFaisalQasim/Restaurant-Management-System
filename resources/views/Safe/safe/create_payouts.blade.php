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
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Payout</h3>
                    @can('view-' . str_slug('Safe'))
                        <a class="btn btn-success pull-right" href="{{ url('/safe/' . $url_restaurant_id) }}">
                            <i class="icon-arrow-left-circle"></i> View Safe</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::open([
                        'url' => '/safe/payouts/create/' . $url_restaurant_id,
                        'class' => 'form-horizontal',
                        'files' => true,
                    ]) !!}

                    @include ('Safe.safe.form_payout')

                    {!! Form::close() !!}

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
                            if (item.date >= $from_date & item.date <= $to_date) {
                                console.log(arr.length + ' if if');
                                item_payment = (item.payment == null) ? "-" : item.payment;
                                console.log(item_payment + "item_payment");
                                item_paycheck = (item.paycheck == null) ? "-" : "-" + item.paycheck;
                                console.log(item_paycheck + "item_paycheck");
                                let Sum_after = (parseInt(total_sum) + (item.payment - item.paycheck))
                                $('tbody').append(
                                    '<tr class="tr_remove" >\
                                                                                                                            <td>' +
                                    item
                                    .date +
                                    '</td>\
                                                                                                                            <td>' +
                                    item_payment +
                                    '</td>\
                                                                                                                            <td>' +
                                    item_paycheck +
                                    '</td>\
                                                                                                                            <td>' +
                                    item.sum +
                                    '</td>\
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
                            console.log(item.restaurant_id + 'this_previous_month 2');
                            console.log($url_restaurant_id + 'this_previous_month 2');
                            item_date = item.date.slice(0, 7)
                            console.log(item_date + 'date');

                            if (item.date.slice(0, 7) == $this_previous_month) {
                                console.log(arr.length + ' else if');
                                item_payment = (item.payment == null) ? "-" : item.payment;
                                console.log(item_payment + "item_payment");
                                item_paycheck = (item.paycheck == null) ? "-" : "-" + item.paycheck;
                                console.log(item_paycheck + "item_paycheck");
                                let Sum_after = (parseInt(total_sum) + (item.payment - item.paycheck))
                                $('tbody').append(
                                    '<tr class="tr_remove" >\
                                                                                                                        <td>' +
                                    item
                                    .date +
                                    '</td>\
                                                                                                                        <td>' +
                                    item_payment +
                                    '</td>\
                                                                                                                        <td>' +
                                    item_paycheck +
                                    '</td>\
                                                                                                                        <td>' +
                                    item.sum +
                                    '</td>\
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
