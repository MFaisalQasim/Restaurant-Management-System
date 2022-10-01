@extends('layouts.master')

<?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$tmp = explode('/', $url);
$url_restaurant_id = intval(end($tmp));
?>
@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Restaurant</h3>
                    @can('add-' . str_slug('Restaurant'))
                        <a class="btn btn-success pull-right" href="{{ url('/restaurant/create') }}"><i class="icon-plus"></i>
                            Add Restaurant</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-borderless" id="myTable">
                            <thead>
                                <tr>
                                    {{-- <th>#</th> --}}
                                    <th>Full Name</th>
                                    <th>Location</th>
                                    <th>Ranking</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ Auth::User()->restaurant_id }}
                                {{ $restaurant[0]->id }} --}}
                                @foreach ($restaurant as $item)
                                    @if (Auth::user()->hasRole('admin') ||
                                        auth()->user()->hasRole('developer'))
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->location }}</td>
                                            <td>{{ $item->ranking }}</td>
                                            <td>
                                                @can('edit-' . str_slug('Restaurant'))
                                                    <a class="" href="{{ url('/dashboard/' . $item->id) }}"
                                                        title="View Restaurant">
                                                        <button class="btn btn-info btn-sm m-2">
                                                            <input type="hidden" name="restaurant_id"
                                                                value="{{ $item->id }}">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> Go to Dashboard
                                                        </button>
                                                    </a>
                                                @endcan
                                                @can('edit-' . str_slug('Restaurant'))
                                                    <a href="{{ url('/restaurant_setting/' . $item->id) }}"
                                                        title="View Restaurant">
                                                        <button class="btn btn-info btn-sm">
                                                            <input type="hidden" name="restaurant_id"
                                                                value="{{ $item->id }}">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> Restaurant Setting
                                                        </button>
                                                    </a>
                                                @endcan

                                                {{-- @can('view-' . str_slug('Restaurant'))
                                                    <a href="{{ url('/restaurant/' . $item->id) }}" title="View Restaurant">
                                                        <button class="btn btn-info btn-sm">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                                        </button>
                                                    </a>
                                                @endcan --}}

                                                @can('edit-' . str_slug('Restaurant'))
                                                    <a href="{{ url('/restaurant/edit/'.$item->id) }}"
                                                        title="Edit Restaurant">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"> </i> Edit
                                                        </button>
                                                    </a>
                                                @endcan

                                                @can('delete-' . str_slug('Restaurant'))
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'url' => ['/restaurant', $item->id],
                                                        'style' => 'display:inline',
                                                    ]) !!}
                                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', [
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Restaurant',
                                                        'onclick' => 'return confirm("Confirm delete?")',
                                                    ]) !!}
                                                @endcan
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @else
                                        @if ($item->id == Auth::User()->restaurant_id)
                                        
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->location }}</td>
                                            <td>{{ $item->ranking }}</td>
                                            <td>
                                                @can('edit-' . str_slug('Restaurant'))
                                                    <a class="" href="{{ url('/dashboard/' . $item->id) }}"
                                                        title="View Restaurant">
                                                        <button class="btn btn-info btn-sm m-2">
                                                            <input type="hidden" name="restaurant_id"
                                                                value="{{ $item->id }}">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> Go to Dashboard
                                                        </button>
                                                    </a>
                                                @endcan
                                                {{-- @can('edit-' . str_slug('Restaurant')) --}}
                                                    <a href="{{ url('/restaurant_setting/' . $item->id) }}"
                                                        title="View Restaurant">
                                                        <button class="btn btn-info btn-sm">
                                                            <input type="hidden" name="restaurant_id"
                                                                value="{{ $item->id }}">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> Restaurant Setting
                                                        </button>
                                                    </a>
                                                {{-- @endcan --}}

                                                {{-- @can('view-' . str_slug('Restaurant'))
                                                    <a href="{{ url('/restaurant/' . $item->id) }}" title="View Restaurant">
                                                        <button class="btn btn-info btn-sm">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                                        </button>
                                                    </a>
                                                @endcan

                                                @can('edit-' . str_slug('Restaurant'))
                                                    <a href="{{ url('/restaurant/' . $item->id . '/edit') }}"
                                                        title="Edit Restaurant">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"> </i> Edit
                                                        </button>
                                                    </a>
                                                @endcan 

                                                @can('delete-' . str_slug('Restaurant'))
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'url' => ['/restaurant', $item->id],
                                                        'style' => 'display:inline',
                                                    ]) !!}
                                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', [
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Restaurant',
                                                        'onclick' => 'return confirm("Confirm delete?")',
                                                    ]) !!}
                                                @endcan--}}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endif
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $restaurant->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('js')
    <script src="{{ asset('plugins/components/toast-master/js/jquery.toast.js') }}"></script>
    <script src="{{ asset('plugins/components/datatables/jquery.dataTables.min.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        // $(document).ready(function() {

        //     @if (\Session::has('message'))
        //         $.toast({
        //             heading: 'Success!',
        //             position: 'top-center',
        //             text: '{{ session()->get('message') }}',
        //             loaderBg: '#ff6849',
        //             icon: 'success',
        //             hideAfter: 3000,
        //             stack: 6
        //         });
        //     @endif
        // })
        $(function() {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>
@endpush --}}
