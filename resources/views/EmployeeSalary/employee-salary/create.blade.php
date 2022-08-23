@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New EmployeeSalary</h3>
                    @can('view-'.str_slug('EmployeeSalary'))
                        <a class="btn btn-success pull-right" href="{{url('/employee-salary')}}">
                            <i class="icon-arrow-left-circle"></i> View EmployeeSalary</a>
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

                    {!! Form::open(['url' => '/employee-salary', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('EmployeeSalary.employee-salary.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
