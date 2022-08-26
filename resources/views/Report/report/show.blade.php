{{-- @extends('layouts.master') --}}
@extends('layouts.design')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    {{-- <h3 class="box-title pull-left">Report {{ $report->id }}</h3> --}}
                    @can('view-' . str_slug('Report'))
                        <a class="btn btn-success pull-right" href="{{ url('/report') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3 shadow mx-auto p-2">
                                    {{-- <form action="{{ route('report.generate') }}" method="post"> --}}
                                        <form action="{{ url('report/generate') }}" method="post">
                                        
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
                                                View Report
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @isset($total)
                        <h4 class="text-primary mt-4 mb-2 font-weight-bold"> Report from {{ $startDate }} to
                            {{ $endDate }}

                        </h4>
                        <table class="table table-hover table-responsive-sm">
                            <thead>
                                <tr>
                                    {{-- <th>Id</th> --}}
                                    {{-- <th>Menus</th> --}}
                                    {{-- <th>Tables</th> --}}
                                    <th>Waiter</th>
                                    <th>Amount</th>
                                    <th>Total income</th>
                                    <th>Total</th>
                                    <th>Type of payment</th>
                                    <th>Payment status</th>
                                    <th>Report Handler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($report as $report)
                                    <tr>
                                        {{-- <td>
                                            @foreach ($report->menus()->where('sales_id', $report->id)->get() as $menu)
                                                <div class="col-md-4 mb-2">
                                                    <div class="h-100">
                                                        <div class="d-flex
                                                        flex-column justify-content-center
                                                        align-items-center">
                                                            <h5 class="font-weight-bold mt-2">
                                                                {{ $menu->title }}
                                                            </h5>
                                                            <h5 class="text-muted">
                                                                {{ $menu->price }} DH
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </td> --}}
                                        {{-- <td>
                                            @foreach ($report->tables()->where('sales_id', $report->id)->get() as $table)
                                                <div class="col-md-4 mb-2">
                                                    <div class="h-100">
                                                        <div class="d-flex
                                                        flex-column justify-content-center
                                                        align-items-center">
                                                            <i class="fa fa-chair fa-3x"></i>
                                                            <h5 class="text-muted mt-2">
                                                                {{ $table->name }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </td> --}}
                                        <td>
                                            {{ $report->card_transactions }}
                                        </td>
                                        <td>
                                            {{ $report->canceled_sale }}
                                        </td>
                                        <td>
                                            {{ $report->supplier_cash }}
                                        </td>
                                        <td>
                                            {{ $report->total_income }}
                                        </td>
                                        <td>
                                            {{ $report->bank_cash_total }}
                                        </td>
                                        <td>
                                            {{ $report->restaurant_id }}
                                        </td>
                                        <td>
                                            {{ $report->report_handler }}
                                        </td>
                                        {{-- <td>
                                            {{ $report->payment_type === "cash" ? "Espéce" : "Carte bancaire"}}
                                        </td> --}}
                                        {{-- <td>
                                            {{ $report->payment_status === "paid" ? "Payé" : "Impayé"}}
                                        </td> --}}
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
                        <form action="{{ route('report.export') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="from" value="{{ $startDate }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="to" value="{{ $endDate }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger">
                                    Generate the Excel Report
                                </button>
                            </div>
                        </form>
                    @endisset
                    {{-- <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $report->id }}</td>
                            </tr>
                            <tr><th> Total Income </th><td> {{ $report->total_income }} </td></tr><tr><th> Card Transactions </th><td> {{ $report->card_transactions }} </td></tr><tr><th> Canceled Sale </th><td> {{ $report->canceled_sale }} </td></tr>
                            </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

@endsection
