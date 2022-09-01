@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    {{-- <h3 class="box-title pull-left">Employee {{ $employee->id }}</h3> --}}
                    @can('view-' . str_slug('Employee'))
                        <a class="btn btn-success pull-right" href="{{ url('/employee/create') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Employee</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 mx-auto p-2">
                                    <form action="{{ route('employee.generate') }}" method="post" class=" d-flex "
                                        style="justify-content: space-around;">
                                        @csrf
                                        <div class="form-group d-flex">
                                            <label class="form-control" for="">from</label>
                                            <input type="date" name="from" placeholder="Date Début"
                                                class="form-control input_border">
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="form-control" for="">to</label>
                                            <input type="date" name="to" placeholder="Date Fin"
                                                class="form-control input_border">
                                        </div>
                                        <div class="form-group d-flex">
                                            <button class="btn btn-primary">
                                                View Employee
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @isset($total)
                        {{-- <h4 class="text-primary mt-4 mb-2 font-weight-bold">
                            Report from {{ $startDate }} to {{ $endDate }}
                        </h4> --}}
                        <div class="table-responsive">
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th> Name </th>
                                        <th>Date of Employment </th>
                                        <th> End of Work Date </th>
                                        <th> Telephone </th>
                                        <th> Status </th>
                                        <th> Salary </th>
                                        @if (auth()->user()->hasRole('admin') ||
                                            auth()->user()->hasRole('developer'))
                                            <th>Restaurant Id</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee as $item)
                                        <tr>
                                            <td> {{ $item->name }} </td>
                                            <td> {{ $item->date_of_employment }} </td>
                                            <td> {{ $item->end_of_work_date }} </td>
                                            <td> {{ $item->telephone }} </td>
                                            <td> {{ $item->status }} </td>
                                            <td> {{ $item->salary }} </td>
                                            @if (auth()->user()->hasRole('admin') ||
                                                auth()->user()->hasRole('developer'))
                                                <td>
                                                    {{ $item->restaurant_id }}
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- <div class="col-md-6">
                            <ul class="input_border" style="padding:0px">

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
                            </ul>
                        </div>
                        <div class="col-md-6">
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
                        </div> --}}
                        {{-- <p class="text-danger text-center font-weight-bold">
                            <span class="border border-danger p-2">
                                Total : {{ $total }} DH
                                Total : {{ $report->bank_cash_total }} DH
                            </span>
                        </p> --}}
                    @endisset

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
