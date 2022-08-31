@extends('layouts.master')
{{-- @extends('layouts.design') --}}
@section('content')

    <script>
        {{ $sum = 0 }}
    </script>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    {{-- <h3 class="box-title pull-left">Safe {{ $safe->id }}</h3> --}}
                    {{-- @can('view-' . str_slug('Safe'))
                        <a class="btn btn-success pull-right" href="{{ url('/safe') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan --}}
                    @can('add-' . str_slug('Safe'))
                        <a class="btn btn-success pull-right" href="{{ url('/safe/payouts/create') }}"><i class="icon-plus"></i> Add
                            Payout</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 mx-auto p-2">
                                    <form action="{{ route('safe.payout.generate') }}" method="post" class=" d-flex " 
                                        style="justify-content: space-around;">
                                    {{-- <form action="{{ url('safe/generate') }}" method="post" class=" d-flex "
                                        style="justify-content: space-around;"> --}}
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
                                            {{-- <button class="btn btn-primary">
                                                View Expenses
                                            </button> --}}
                                            <input  class="btn btn-primary" type="submit" value="View Payout">
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
                                    {{-- <th>#</th> --}}
                                    <th>Date</th>
                                    <th>Payment</th>
                                    <th>Paycheck</th>
                                    <th>Sum after transaction
                                    </th>
                                    @if (auth()->user()->hasRole('admin') ||
                                        auth()->user()->hasRole('developer'))
                                        <th>Belong To Restaurant
                                        </th>
                                    @endif

                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($report as $report)
                                    <tr>
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
                                    </tr>
                                @endforeach --}}
                                @foreach ($safe as $item)
                                    <tr>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->sum }}</td>
                                        <td>-{{ $item->paycheck }}</td>
                                        <td>{{ $item->payment }}</td>
                                        @if (auth()->user()->hasRole('admin') ||
                                            auth()->user()->hasRole('developer'))
                                            <td>{{ $item->sum }}</td>
                                            <th>{{ $item->restaurant_id }}
                                            </th>
                                        @else
                                            <td>{{ $safe_sum }}</td>
                                        @endif
                                    </tr>
                                    <input type="hidden" name="" value="{{ $sum = $item->sum }}">
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    {{-- <td>{{$sum}}</td> --}}
                                    @if (auth()->user()->hasRole('admin') ||
                                        auth()->user()->hasRole('developer'))
                                        <td>{{ $safe_sum }}</td>
                                    @else
                                        <td>{{ $safe_sum }}</td>
                                    @endif

                                </tr>
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
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
