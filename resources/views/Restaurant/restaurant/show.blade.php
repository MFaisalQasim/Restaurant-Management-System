@extends('layouts.master')
<?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$tmp = explode('/', $url);
$url_restaurant_id = intval(end($tmp));
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
                        <a class="btn btn-success pull-right ml-4" href="{{ url('/restaurant') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    @can('add-' . str_slug('Restaurant'))
                        <a class="btn btn-primary  m-3" href="{{ asset('user/create/' . $url_restaurant_id) }}">
                            Add New User</a>
                    @endcan
                    @can('edit-' . str_slug('Restaurant'))
                        <a class="btn btn-danger   m-3" href="{{ asset('users/' . $url_restaurant_id) }}">
                            Manage User</a>
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

                                            <select class="emp_status form-control input_border" name="emp_status"
                                                id="emp_status" onchange="restaurant_fetch()">
                                                <option value="1">Active</option>
                                                <option value="2">InActive</option>
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
                                    <th> Full Name </th>
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
                            <div class="row input_border
                            ">
                                <div class="col">
                                    <ul class="" style="padding:0px">
                                        @foreach ($users as $key => $item)
                                            <li style="display: flex ; list-style:none ">
                                                <input class="" type="text" name="" id=""
                                                    {{-- style="border: none;" --}} value="{{ $item->salary }} " readonly>
                                                {{-- &nbsp;
                                            &nbsp;
                                            <input class="" type="text" name="" id=""
                                                value="{{ $item->name }}" readonly> --}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col">
                                    <div class="row p-2">

                                        @can('add-' . str_slug('Suppliers'))
                                            <a class=" btn-success pull-right m-1"
                                                href="{{ url('/suppliers/create/' . $url_restaurant_id) }}"><i
                                                    class="icon-plus"></i>
                                                Add Suppliers
                                            </a>
                                        @endcan
                                        {{-- </div>
                                    <div class="row"> --}}
                                        <ul class="" style="padding:0px">
                                            @foreach ($supplier as $key => $item)
                                                <li class="m-1" style="display: flex ; list-style:none ; ">
                                                    <input class="" type="text" name="" id=""
                                                        value="{{ $item->name }}" readonly>
                                                    {{-- &nbsp;
                                                &nbsp;
                                                <input class="" type="text" name="" id=""
                                                    value="{{ $item->sum }}" readonly> --}}

                                                    {{-- @can('view-' . str_slug('Suppliers'))
                                                        <a href="{{ url('/suppliers/' . $item->id) }}" title="View Supplier">
                                                            <button class="btn btn-info btn-sm">
                                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                                            </button>
                                                        </a>
                                                    @endcan --}}

                                                    @can('edit-' . str_slug('Suppliers'))
                                                        <a class="m-1" href="{{ url('/suppliers/edit/' . $item->id) }}"
                                                            title="Edit Supplier">
                                                            <button class=" btn-primary btn-sm">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"> </i>
                                                            </button>
                                                        </a>
                                                    @endcan
                                                    @can('delete-' . str_slug('Suppliers'))
                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'url' => ['/suppliers/delete', $item->id],
                                                            'style' => 'display:inline',
                                                        ]) !!}
                                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', [
                                                            'type' => 'submit',
                                                            'class' => ' btn-danger btn-sm m-1',
                                                            'title' => 'Delete Supplier',
                                                            'onclick' => 'return confirm("Confirm delete?")',
                                                        ]) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @if (auth()->user()->hasRole('admin') ||
                                auth()->user()->hasRole('developer'))
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
                                        id="active_for_this_restaurant1" value="yes"
                                        @if ($restaurant->active_for_this_restaurant == 'yes') checked @endif>
                                    <label class="form-check-label" for="active_for_this_restaurant1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="active_for_this_restaurant"
                                        id="active_for_this_restaurant2" value="no">
                                    <label class="form-check-label" for="active_for_this_restaurant2">No</label>
                                </div>
                                <p>
                                    How many last days do employees see cash
                                    reports?</p>
                                <input type="text" name="see_cash_reports_days" id="see_cash_reports_days"
                                    placeholder="none">
                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-4">
                                        <input type="submit" value="Save">
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        $(document).ready(function() {
            restaurant_fetch();

        })

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
                                                                                        <td>' + item.name + ' ' + item
                                    .surname + '</td>\
                                                                                        <td>' + item.date_of_employment
                                    .slice(0, 10) + '</td>\
                                                                                        <td>' + item.end_of_work_date
                                    .slice(0, 10) + '</td>\
                                                                                        <td>' + item.telephone + '</td>\
                                                                                        <td>' + item.status + '</td>\
                                                                                        <td>' + item.salary + '</td>\
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
