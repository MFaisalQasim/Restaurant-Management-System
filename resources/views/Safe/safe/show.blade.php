{{-- @extends('layouts.master') --}}
@extends('layouts.design')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    {{-- <h3 class="box-title pull-left">Safe {{ $safe->id }}</h3> --}}
                    @can('view-' . str_slug('Safe'))
                        <a class="btn btn-success pull-right" href="{{ url('/safe') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3 shadow mx-auto p-2">
                                    <form action="{{ route('safe.generate') }}" method="post">
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
                                                View Safe
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @isset($total)
                        <h4 class="text-primary mt-4 mb-2 font-weight-bold">
                            Report from {{ $startDate }} to {{ $endDate }}
                        </h4>
                        <table class="table table-hover table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Complete Name</th>
                                    <th>Sum</th>
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
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->employee_complete_name }}</td>
                                        <td>{{ $item->sum }}</td>
                                        {{-- <td>
                                            @can('view-' . str_slug('Safe'))
                                                <a href="{{ url('/safe/' . $item->id) }}" title="View Safe">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                                    </button>
                                                </a>
                                            @endcan

                                            @can('edit-' . str_slug('Safe'))
                                                <a href="{{ url('/safe/' . $item->id . '/edit') }}" title="Edit Safe">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"> </i> Edit
                                                    </button>
                                                </a>
                                            @endcan

                                            @can('delete-' . str_slug('Safe'))
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'url' => ['/safe', $item->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', [
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'Delete Safe',
                                                    'onclick' => 'return confirm("Confirm delete?")',
                                                ]) !!}
                                            @endcan
                                            {!! Form::close() !!}
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
