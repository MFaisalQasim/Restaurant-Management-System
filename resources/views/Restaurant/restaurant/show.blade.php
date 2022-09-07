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
$month = $month;
$year_month = $year . '-' . $month;
?>


@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Restaurant Setting
                        {{-- {{ auth()->user()->restaurant_id }} --}}
                    </h3>
                    @can('view-' . str_slug('Restaurant'))
                        <a class="btn btn-success pull-right" href="{{ url('/restaurant') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <input type="hidden" name="url_restaurant_id" id="url_restaurant_id" value="{{ $url_restaurant_id }}">
                    <div class="clearfix"></div>
                    <hr>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 mx-auto p-2">

                                    <h3 class="box-title pull-left">Employee List
                                    </h3>
                                    <div class=" d-flex " style="justify-content: space-around;">
                                        <input type="hidden" name="url_restaurant_id" id="url_restaurant_id"
                                            value="{{ $url_restaurant_id }}">
                                        <div class="form-group d-flex">

                                            <select class="emp_status form-control input_border" name="emp_status" id="emp_status"
                                                onchange="restaurant_fetch()">
                                                <option value="2">InActive</option>
                                                <option value="1">Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-responsive-sm" id="myTable">

                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th>Date of Employment </th>
                                    <th> End of Work Date </th>
                                    <th> Telephone </th>
                                    <th> Status </th>
                                    <th> Salary </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($users as $item)
                                    <tr>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->date_of_employment }} </td>
                                        <td> {{ $item->end_of_work_date }} </td>
                                        <td> {{ $item->telephone }} </td>
                                        <td>
                                            {{ $item->status == 1 ? 'Active ' : 'InActive' }}
                                        </td>
                                        <td> {{ $item->salary }} </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                        <div class="col-md-6">
                            {{-- <ul class="input_border" style="padding:0px">

                                @foreach ($supplier as $key => $item)
                                    <li style="display: flex ; list-style:none ; ">
                                        <input class="" type="text" name="" id=""
                                            value="{{ $item->name }}" readonly>
                                        &nbsp;
                                        &nbsp;
                                        <input class="" type="text" name="" id=""
                                            value="{{ $item->sum }}" readonly>
                                    </li>
                                @endforeach
                            </ul> --}}
                        </div>
                        <div class="col-md-6">
                            {!! Form::model($restaurant, [
                                'method' => 'PATCH',
                                'url' => ['/restaurant_setting', $restaurant->id],
                                'class' => 'form-horizontal',
                                'files' => true,
                            ]) !!}
                            <p>Is Active for this restaurant (Sales volume by
                                suppliers) ?</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="active_for_this_restaurant"
                                    id="active_for_this_restaurant1" value="option1">
                                <label class="form-check-label" for="active_for_this_restaurant1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="active_for_this_restaurant"
                                    id="active_for_this_restaurant2" value="option2">
                                <label class="form-check-label" for="active_for_this_restaurant2">No</label>
                            </div>
                            <p>
                                How many last days do employees see cash
                                reports?</p>
                            <input type="text" name="see_cash_reports_days" id="see_cash_reports_days">
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    {{-- {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!} --}}
                                    <input type="submit" value="Save">
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        // $(document).ready( function () {
        // restaurant_fetch();


        function restaurant_fetch() {
            $emp_status = $('#emp_status').val();
            console.log($emp_status + 'emp_status 1');

            $url_restaurant_id = $('#url_restaurant_id').val();
            console.log($url_restaurant_id + 'url_restaurant_id');

            $.ajax({
                type: "GET",
                url: '{{ url('restaurant/fetch/' . $url_restaurant_id) }}',
                dataType: "json",
                success: function(response) {
                    console.log(response.user);
                    arr = response.user;
                    $('tbody').find('tr').remove()
                    response.user.forEach(item => {
                        if (item.restaurant_id == $url_restaurant_id) {
                            console.log(item.restaurant_id + 'restaurant_id');
                            console.log(item.date_of_employment + 'date_of_employment');
                            if (item.status == $emp_status) {
                                console.log(arr.length + ' if if');
                                $('tbody').append(
                                    '<tr class="tr_remove" >\
                                                                    <td>' + item.name + '</td>\
                                                                    <td>' + item.date_of_joining + '</td>\
                                                                    <td>' + item.date_of_leaving + '</td>\
                                                                    <td>' + item.telephone + '</td>\
                                            <td>' + item.status + '</td>\
                                            <td>' + item.salary +'</td>\
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
