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


// $url_restaurant_id = 0;
// {$today = date('Y-m-d');}
?>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Salary</h3>
                    {{-- @can('view-'.str_slug('EmployeeSalary'))
                        <a class="btn btn-success pull-right" href="{{url('/employee-salary/'. $url_restaurant_id)}}">
                            <i class="icon-arrow-left-circle"></i> View Salary</a>
                    @endcan --}}
                    <div class="clearfix"></div>
                    <hr>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::open(['url' => '/employee-salary/create/'. $url_restaurant_id, 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('EmployeeSalary.employee-salary.form')

                    <hr>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection