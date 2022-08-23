@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Testing {{ $testing->id }}</h3>
                    @can('view-'.str_slug('Testing'))
                        <a class="btn btn-success pull-right" href="{{ url('/testing/testing') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $testing->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $testing->name }} </td></tr><tr><th> Phone </th><td> {{ $testing->phone }} </td></tr><tr><th> Date </th><td> {{ $testing->date }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

