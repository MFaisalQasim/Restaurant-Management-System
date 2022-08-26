{{-- @extends('layouts.master') --}}
@extends('layouts.design')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    {{-- <h3 class="box-title pull-left">EmployeeSalary {{ $employeesalary->id }}</h3> --}}
                    @can('view-' . str_slug('EmployeeSalary'))
                        <a class="btn btn-success pull-right" href="{{ url('/employee-salary') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3 shadow mx-auto p-2">
                                    <form action="{{ route('employeesalary.generate') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="date" name="from" placeholder="Date Début"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" name="to" placeholder="Date Fin"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary">
                                                View Safe
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @isset($total)
                        <h4 class="text-primary mt-4 mb-2 font-weight-bold">
                            Report from {{ $startDate }} to {{ $endDate }}
                        </h4>
                        <table class="table table-hover table-responsive-sm">
                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th> Number Of Hours </th>
                                    <th> Rate   </th>
                                    <th> Sum </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employeesalary as $item)
                                    <tr>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->number_of_hours }} </td>
                                        <td> {{ $item->rate }} </td>
                                        <td> {{ $item->number_of_hours * $item->rate
                                        
                                    }}
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
                                    <td>{{ $employeesalary->id }}</td>
                                </tr>
                                <tr>
                                    <th> Name </th>
                                    <td> {{ $employeesalary->name }} </td>
                                </tr>
                                <tr>
                                    <th> Number Of Hours </th>
                                    <td> {{ $employeesalary->number_of_hours }} </td>
                                </tr>
                                <tr>
                                    <th> Rate   </th>
                                    <td> {{ $employeesalary->rate }} </td>
                                </tr>
                                <tr>
                                    <th> Sum </th>
                                    <td> {{ $employeesalary->number_of_hours * $employeesalary->rate
                                    
                                }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
