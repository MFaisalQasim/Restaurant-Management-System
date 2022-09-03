@extends('layouts.master')

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
                        <table class="table table-hover table-responsive-sm">
                            {{-- <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>location</th>
                                    <th>Ranking</th>
                                    @if (auth()->user()->hasRole('admin') ||
    auth()->user()->hasRole('developer'))
                                        <th>Restaurant Id</th>
                                        <th>Report Handler</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($restaurant as $restaurant)
                                    <tr>
                                        <td>
                                            {{ $restaurant->created_at->format('Y-m-d') }}
                                        </td>
                                        <td>
                                            {{ $restaurant->location }}
                                        </td>
                                        <td>
                                            {{ $restaurant->ranking }}
                                        </td>
                                        

                                        @if (auth()->user()->hasRole('admin') ||
    auth()->user()->hasRole('developer'))
                                            <td>
                                                {{ $restaurant->restaurant_id }}
                                            </td>
                                            <td>
                                                {{ $restaurant->report_handler }}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody> --}}

                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th>Date of Employment </th>
                                    <th> End of Work Date </th>
                                    <th> Telephone </th>
                                    <th> Status </th>
                                    <th> Salary </th>
                                    {{-- <th> Active As A </th> --}}
                                    @if (auth()->user()->hasRole('admin') ||
                                        auth()->user()->hasRole('developer'))
                                        <th>Restaurant Id</th>
                                    @endif

                                </tr>
                                {{-- <script>
                                    {{ $restaurant_id_selected = 3 }}
                                </script> --}}
                                {{-- <select name="restaurant_id_selected" id="restaurant_id_selected">
                                    @foreach ($restaurant as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach

                                </select> --}}

                                {{-- <script>
                                    restaurant_id_selected = document.getElementById('restaurant_id_selected').value
                                    console.log(restaurant_id_selected);
                                </script> --}}
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    {{-- @if ($item->restaurant_id == $restaurant_id_selected) --}}
                                    {{-- @if ($item->role_in_restaurant == 'customer') --}}
                                    @if ($item->hasRole('Customer'))
                                        <tr>
                                            <td> {{ $item->name }} </td>
                                            <td> {{ $item->date_of_employment }} </td>
                                            <td> {{ $item->end_of_work_date }} </td>
                                            <td> {{ $item->telephone }} </td>
                                            <td> {{ $item->status }} </td>
                                            <td> {{ $item->salary }} </td>
                                            {{-- <td> {{ $item->role_in_restaurant }} </td> --}}
                                            @if (auth()->user()->hasRole('admin') ||
                                                auth()->user()->hasRole('developer'))
                                                <td>
                                                    {{ $item->restaurant_id }}
                                                </td>
                                            @endif
                                        </tr>
                                        {{-- @else --}}
                                    @endif
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
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {{-- {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!} --}}
                                <input type="submit" value="Save">
                            </div>
                        </div>
                        {{-- <table class="table table">
                            <tbody> --}}
                        {{-- <tr>
                                    <th>ID</th>
                                    <td>{{ $restaurant->id }}</td>
                                </tr> --}}
                        {{-- <tr>
                                    <th> Name </th>
                                    <td> {{ auth()->user()->restaurant_id }} </td>
                                </tr> --}}
                        {{-- <tr>
                                    <th> Location </th>
                                    <td> {{ $restaurant->location }} </td>
                                </tr>
                                <tr>
                                    <th> Ranking </th>
                                    <td> {{ $restaurant->location }} </td>
                                </tr> --}}
                        {{-- </tbody>
                        </table> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
