{{-- @extends('layouts.master') --}}
@extends('layouts.design')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    {{-- <h3 class="box-title pull-left">Expense {{ $expense->id }}</h3> --}}
                    @can('view-' . str_slug('Expenses'))
                        <a class="btn btn-success pull-right" href="{{ url('/expenses') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3 shadow mx-auto p-2">
                                    <form action="{{ route('expenses.generate') }}" method="post">
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
                                                View Expenses
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @dd($expensesFile) --}}
                    @isset($total)
                        <h4 class="text-primary mt-4 mb-2 font-weight-bold">
                            Report from {{ $startDate }} to {{ $endDate }}
                        </h4>
                        <table class="table table-hover table-responsive-sm">
                            <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> For Whom </th>
                                    <th> Sum </th>
                                    <th> File </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dd($expensesFile) --}}
                                @foreach ($expenses as $item)
                                    <tr>
                                        <td> {{ $item->date_of_expense }} </td>
                                        <td> {{ $item->for_whom }} </td>
                                        <td> {{ $item->sum }} </td>
                                        <td>
                                            @foreach ($expensesFile as $file)
                                            @if ($item->id == $file->expenses_id)
                                            {{-- <td> {{ $item->id }} </td>
                                                <td> {{ $item->expenses_id }} </td>
                                                <td> {{ $item->date_of_issue }} </td> --}}
                                            {{-- <td> --}}
                                                <a href="{{ $file->file }}">Download!</a>
                                            
                                            {{-- </td> --}}
                                                
                                            @endif
                                            @endforeach
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
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
