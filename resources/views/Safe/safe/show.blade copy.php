@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Safe {{ $safe->id }}</h3>
                    @can('view-' . str_slug('Safe'))
                        <a class="btn btn-success pull-right" href="{{ url('/safe') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $safe->id }}</td>
                                </tr>
                                <tr>
                                    <th> Employee Complete Name </th>
                                    <td> {{ $safe->employee_complete_name }} </td>
                                </tr>
                                <tr>
                                    <th> Amount of Money  </th>
                                    <td> {{ $safe->sum }} </td>
                                </tr>
                                <tr>
                                    <th> Date of Deposited  </th>
                                    <td> {{ $safe->date_of_deposited  }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
