@extends('layouts.master')

{{-- @push('css')
    <link href="{{ asset('plugins/components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endpush --}}

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Restaurant Setting
                        {{-- {{ auth()->user()->restaurant_id }} --}}
                    </h3>
                    @can('view-' . str_slug('Restaurant'))
                        <a class="btn btn-success pull-right" href="{{ url('/restaurant') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover table-responsive-sm" id="myTable">

                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th>Date of Employment </th>
                                    <th> End of Work Date </th>
                                    <th> Telephone </th>
                                    <th> Status </th>
                                    <th> Salary </th>
                                </tr>
                            </thead>
                            <select name="emp_status" id="emp_status" class="emp_status">
                                <option value="2">InActive</option>
                                <option value="1">Active</option>
                            </select>
                            <tbody>
                                @foreach ($users as $item)
                                    {{-- @if ($item->hasRole('Employee')) --}}
                                    <tr>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->date_of_employment }} </td>
                                        <td> {{ $item->end_of_work_date }} </td>
                                        <td> {{ $item->telephone }} </td>
                                        <td>
                                            {{ $item->status == 1 ? 'Active ' : 'InActive' }}
                                        </td>
                                        <td> {{ $item->salary }} </td>
                                    </tr>
                                    {{-- @endif --}}
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-6">
                            <ul class="input_border" style="padding:0px">

                                @foreach ($supplier as $key => $item)
                                    <li style="display: flex ; list-style:none ; ">
                                        <input class="" type="text" name="" id=""
                                            value="{{ $item->name }}" readonly>
                                        &nbsp;
                                        &nbsp;
                                        <input class="" type="text" name="" id=""
                                            value="{{ $item->sum }}" readonly>
                                        {{-- <input type="hidden" name="" id=""
                                            value="{{ $item->supplier_cash += $item->sum }}" disabled>
                                        <input type="hidden" name="" id="" value="{{ $sum += $item->sum }}"
                                            disabled> --}}
                                    </li>
                                    {{-- {{$supplier->supplier_cash}} --}}
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            {!! Form::model($restaurant, [
                                'method' => 'PATCH',
                                'url' => ['/restaurant_setting', $restaurant->id],
                                'class' => 'form-horizontal',
                                'files' => true,
                            ]) !!}
                            <p>Is Active for this restaurant (Sales volume by
                                suppliers) ?</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="active_for_this_restaurant"
                                    id="active_for_this_restaurant1" value="option1">
                                <label class="form-check-label" for="active_for_this_restaurant1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="active_for_this_restaurant"
                                    id="active_for_this_restaurant2" value="option2">
                                <label class="form-check-label" for="active_for_this_restaurant2">No</label>
                            </div>
                            <p>
                                How many last days do employees see cash
                                reports?</p>
                            <input type="text" name="see_cash_reports_days" id="see_cash_reports_days">
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    {{-- {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!} --}}
                                    <input type="submit" value="Save">
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('js')
<script src="{{ asset('plugins/components/toast-master/js/jquery.toast.js') }}"></script>
<script src="{{ asset('plugins/components/datatables/jquery.dataTables.min.js') }}"></script>
<script>
    
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
