@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">TotalCash {{ $totalcash->id }}</h3>
                    @can('view-'.str_slug('TotalCash'))
                        <a class="btn btn-success pull-right" href="{{ url('/total-cash') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $totalcash->id }}</td>
                            </tr>
                            <tr><th> Bank Note </th><td> {{ $totalcash->bank_note }} </td></tr><tr><th> Pieces </th><td> {{ $totalcash->pieces }} </td></tr><tr><th> Together Bank Note Pieces </th><td> {{ $totalcash->together_bank_note_pieces }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

