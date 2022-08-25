@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Expense {{ $expense->id }}</h3>
                    @can('view-' . str_slug('Expense'))
                        <a class="btn btn-success pull-right" href="{{ url('/expenses') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $expense->id }}</td>
                                </tr>
                                <tr>
                                    <th> For Whom </th>
                                    <td> {{ $expense->for_whom }} </td>
                                </tr>
                                <tr>
                                    <th> Sum </th>
                                    <td> {{ $expense->sum }} </td>
                                </tr>
                                <tr>
                                    <th> Date </th>
                                    <td> {{ $expense->date_of_expense }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
