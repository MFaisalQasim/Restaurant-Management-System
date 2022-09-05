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
?>
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
                        <a class="btn btn-success pull-right" href="{{ url('/safe/create') }}"><i class="icon-plus"></i> Add New
                            Safe
                        </a>
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
                                                class="form-control input_border from" data-id="2">
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="form-control" for="">To</label>
                                            <input type="date" name="to" placeholder="Date" id="to"
                                                onload="getDate()" value="<?php echo $today; ?>"
                                                class="form-control input_border">
                                                <input type="hidden" name="url_restaurant_id" id="url_restaurant_id" value="{{$url_restaurant_id}}">
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="form-control" for="">Month</label>
                                            <input type="month" name="month" placeholder="month" id="month"
                                                onload="getMonth()" value="<?php echo $month; ?>"
                                                class="form-control input_border">
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
                                                    {{ number_format($safe_sum, 2, '.', ',') }} </label>
                                            @endif
                                        </div>

                                        <div class="form-group d-flex">
                                            <button class="btn btn-primary" onclick="safe_fetch()">
                                                View Safe
                                            </button>
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
                                <th>Payment</th>
                                <th>Paycheck</th>
                                <th>Sum after transaction
                                </th>
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
    <script>
        // $(document).ready( function () {
        // safe_fetch();


        function safe_fetch() {
            $from_date = $('#from').val();
            $to_date = $('#to').val();
            $month = $('#month').val();
            console.log($from_date);
            console.log($to_date);
            console.log($month);
            
            $url_restaurant_id = $('#url_restaurant_id').val();
            console.log($url_restaurant_id);
            // url_restaurant_id = $url_restaurant_id;
            // console.log($url_restaurant_id);
            // console.log(url_restaurant_id);
            $.ajax({
                type: "GET",
                url: '{{ url('safe/fetch/' . $url_restaurant_id) }}',
                dataType: "json",
                success: function(response) {
                    // console.log(response.safe);
                    arr = response.safe;
                    $('tbody').find('tr').remove()
                    response.safe.forEach(item => {
                        if (item.restaurant_id == $url_restaurant_id) {
                        if (!$month) {
                            console.log(arr.length + ' if');
                            console.log($month + 'not month');

                            if (item.date >= $from_date & item.date <= $to_date) {
                                console.log(arr.length + ' if if');
                                $('tbody').append(
                                    '<tr class="tr_remove" >\
                                                    <td>' + item.date + '</td>\
                                                    <td>' + item.paycheck + '</td>\
                                                    <td>' + item.payment + '</td>\
                                                    <td>' + (item.payment - item.paycheck) + '</td>\
                                                                                             </tr>'
                                )

                            }
                        } else {
                            console.log($month + 'month');
                            item_date = item.date.slice(0, 7)
                            console.log(item_date);

                            // console.log($month + 'month' + (item.date).format( "M-yy") + 'date');
                            // console.log(formatDate( "M-yy", item.date););

                            if (item.date.slice(0, 7) == $month) {
                                console.log(arr.length + ' else if');
                                $('tbody').append(
                                    '<tr class="tr_remove" >\
                                                    <td>' + item.date + '</td>\
                                                    <td>' + item.paycheck + '</td>\
                                                    <td>' + item.payment + '</td>\
                                                    <td>' + (item.payment - item.paycheck) + '</td>\
                                                                                             </tr>'
                                )

                            }
                        }
                            
                        }

                    });
                }
            });

        }
        // })
    </script>
@endpush
