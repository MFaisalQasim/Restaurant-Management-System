@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Restaurant {{ $restaurant->id }}</h3>
                    @can('view-'.str_slug('Restaurant'))
                        <a class="btn btn-success pull-right" href="{{ url('/restaurant') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $restaurant->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $restaurant->name }} </td></tr><tr><th> Location </th><td> {{ $restaurant->location }} </td></tr><tr><th> Ranking </th><td> {{ $restaurant->ranking }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

