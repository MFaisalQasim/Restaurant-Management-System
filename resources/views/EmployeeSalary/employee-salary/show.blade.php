@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">EmployeeSalary {{ $employeesalary->id }}</h3>
                    @can('view-' . str_slug('EmployeeSalary'))
                        <a class="btn btn-success pull-right" href="{{ url('/employee-salary') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
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
                                {{-- // $employeesalary->sum  --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
