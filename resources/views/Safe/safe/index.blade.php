@extends('layouts.master')

@push('css')
    <link href="{{ asset('plugins/components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Safe</h3>
                    @can('add-' . str_slug('Safe'))
                        <a class="btn btn-success pull-right"
                         href="{{ url('/safe/create') }}"
                         {{-- href="{{url()->previous() }}" --}}
                         >
                         {{-- <i class="icon-plus"></i> --}}
                          Bach
                        </a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-borderless" id="myTable">
                            <thead>
                                <tr>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($safe as $item)
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->sum }}</td>
                                    <td>{{ $item->sum }}</td>
                                    @if (auth()->user()->hasRole('admin') ||
                                        auth()->user()->hasRole('developer'))
                                        <td>{{ $item->sum }}</td>
                                        <td>{{ $item->restaurant_id }}
                                        </td>
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
                                    {{-- <td></td> --}}
                                </tr>
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $safe->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



@push('js')
    <script src="{{ asset('plugins/components/toast-master/js/jquery.toast.js') }}"></script>

    <script src="{{ asset('plugins/components/datatables/jquery.dataTables.min.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {

            @if (\Session::has('message'))
                $.toast({
                    heading: 'Success!',
                    position: 'top-center',
                    text: '{{ session()->get('message') }}',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 6
                });
            @endif
        })

        $(function() {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>
@endpush
