@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Supplier
                         {{-- {{ $supplier->id }} --}}
                        </h3>
                    @can('view-'.str_slug('Supplier'))
                        <a class="btn btn-success pull-right" href="{{ url('/suppliers') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $supplier->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $supplier->name }} </td></tr><tr><th> Sum </th><td> {{ $supplier->sum }} </td></tr><tr><th> Date Of Order </th><td> {{ $supplier->date_of_order }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

