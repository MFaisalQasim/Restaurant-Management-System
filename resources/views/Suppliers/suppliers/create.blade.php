@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Supplier</h3>
                    @can('view-'.str_slug('Supplier'))
                        <a class="btn btn-success pull-right" href="{{url('/suppliers')}}">
                            <i class="icon-arrow-left-circle"></i> View Supplier</a>
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

                    {!! Form::open(['url' => '/suppliers', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('Suppliers.suppliers.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
