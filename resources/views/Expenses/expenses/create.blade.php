@extends('layouts.master')

<?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$tmp = explode('/', $url);
$url_restaurant_id = intval(end($tmp));
$sum = 0;

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Expense</h3>
                    @can('view-'.str_slug('Expenses'))
                        <a class="btn btn-success pull-right" href="{{url('/expenses/'. $url_restaurant_id)}}">
                            <i class="icon-arrow-left-circle"></i> View Expense</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::open(['url' => '/expenses/create/'. $url_restaurant_id, 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('Expenses.expenses.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
