@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Test</h3>
                    @can('view-'.str_slug('Test'))
                        <a class="btn btn-success pull-right" href="{{url('/test')}}">
                            <i class="icon-arrow-left-circle"></i> View Test</a>
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

                    {!! Form::open(['url' => '/test', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('Test.test.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
