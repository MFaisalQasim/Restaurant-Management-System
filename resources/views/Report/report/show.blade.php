@extends('layouts.master')
{{-- @extends('layouts.design') --}}

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    {{-- <h3 class="box-title pull-left">Report {{ $report->id }}</h3> --}}
                    {{-- @can('view-' . str_slug('Report'))
                        <a class="btn btn-success pull-right" href="{{ url('/report') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan --}}
                    @can('add-' . str_slug('Report'))
                        <a class="btn btn-success pull-right" href="{{ url('report/create') }}"><i class="icon-plus"></i> Add
                            Report</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 mx-auto p-2">
                                    <form action="{{ route('report.generate') }}" method="post" class=" d-flex "
                                        style="justify-content: space-around;">
                                        @csrf
                                        
                            @if (auth()->user()->hasRole('admin') ||
                            auth()->user()->hasRole('developer'))
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
                                        @endif
                                        <div class="form-group d-flex">
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
                        {{-- <h4 class="text-primary mt-4 mb-2 font-weight-bold"> Report from {{ $startDate }} to
                            {{ $endDate }}

                        </h4> --}}
                        <table class="table table-hover table-responsive-sm">
                            <thead>
                                <tr>
                                    {{-- <th>Id</th> --}}
                                    {{-- <th>Menus</th> --}}
                                    <th>Date</th>
                                    <th>Total income</th>
                                    <th>Card Transactions</th>
                                    <th>Canceled Sale</th>

                                    @foreach ($supplier as $item)
                                        <th>
                                            {{ $item->name }}
                                        </th>
                                    @endforeach
                                    <th>Supplier Cash</th>
                                    <th>Bank Cash Total</th>
                                    <th>Status</th>
                                    @if (auth()->user()->hasRole('admin') ||
                                        auth()->user()->hasRole('developer'))
                                        <th>Restaurant Id</th>
                                        {{-- <th>Report Handler</th> --}}
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($report as $report)
                                    <tr>
                                        <td>
                                            {{-- {{ $report->date }} --}}
                                            {{ $report->created_at->format('Y-m-d') }}
                                        </td>
                                        <td>
                                            {{ $report->total_income }}
                                        </td>
                                        <td>
                                            {{ $report->card_transactions }}
                                        </td>
                                        <td>
                                            {{ $report->canceled_sale }}
                                        </td>
                                        <td>
                                            {{ $report->supplier_cash }}
                                        </td>
                                        @foreach ($supplier as $item)
                                            <td>
                                                {{ $item->sum }}
                                            </td>
                                        @endforeach
                                        <td>
                                            {{ $report->bank_cash_total }}
                                        </td>
                                        <td>
                                           {{ 
                                            ($report->bank_cash_total - $report->cash >= -5)
                                            ? "Compliant =" .($report->bank_cash_total - $report->cash)
                                            : "Incosistent ="   .($report->bank_cash_total - $report->cash)
                                            }}
                                            {{-- {{ $report->bank_cash_total - $report->cash }} --}}
                                        </td>
                                        @if (auth()->user()->hasRole('admin') ||
                                            auth()->user()->hasRole('developer'))
                                            <td>
                                                {{ $report->restaurant_id }}
                                            </td>
                                            {{-- <td>
                                                {{ $report->report_handler }}
                                            </td> --}}
                                        @endif
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

                            @if (auth()->user()->hasRole('admin') ||
                            auth()->user()->hasRole('developer'))
                                <div class="form-group">
                                    <input type="hidden" name="from" value="{{ $startDate }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="to" value="{{ $endDate }}" class="form-control">
                                </div>
                                @endif
                            {{-- <div class="form-group">
                                <button class="btn btn-danger">
                                    Generate the Excel Report
                                </button>
                            </div> --}}
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
