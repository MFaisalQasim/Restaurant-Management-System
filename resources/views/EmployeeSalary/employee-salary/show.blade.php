@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    {{-- <h3 class="box-title pull-left">Employee {{ $employee->id }}</h3> --}}
                    @can('view-' . str_slug('EmployeeSalary'))
                        <a class="btn btn-success pull-right" href="{{ url('/employee-salary') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i>View Employee salary</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 mx-auto p-2">
                                    <form action="{{ route('employeesalary.generate') }}" method="post" class=" d-flex "
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
                                                View Employee Salary
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
                                @foreach ($employeesalary as $item)
                                    <tr>
                                        <td> {{ $item->name }} </td>
                                        {{-- <td> {{ $item->start_hour }} </td>
                                        <td> {{ $item->finish_hour }} </td> --}}
                                        <td> {{ abs((strtotime($item->finish_hour) - strtotime($item->start_hour)) / 3600) * $item->rate }}
                                        </td>
                                        <td>{{ abs(strtotime($item->finish_hour) - strtotime($item->start_hour)) / 3600 }}</td>
                                        <td> {{ $item->rate }} </td>
                                        <td> {{ $item->bonus_sum }}
                                        </td>
                                        <td> {{ abs(((strtotime($item->finish_hour) - strtotime($item->start_hour)) / 3600) * $item->rate + $item->bonus_sum) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
