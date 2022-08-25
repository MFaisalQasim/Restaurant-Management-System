@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Report {{ $report->id }}</h3>
                    @can('view-'.str_slug('Report'))
                        <a class="btn btn-success pull-right" href="{{ url('/report') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $report->id }}</td>
                            </tr>
                            <tr><th> Total Income </th><td> {{ $report->total_income }} </td></tr><tr><th> Card Transactions </th><td> {{ $report->card_transactions }} </td></tr><tr><th> Canceled Sale </th><td> {{ $report->canceled_sale }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

