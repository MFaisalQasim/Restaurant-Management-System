@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Testing</h3>
                    @can('view-'.str_slug('Testing'))
                        <a class="btn btn-success pull-right" href="{{url('/testing/testing')}}">
                            <i class="icon-arrow-left-circle"></i> View Testing</a>
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

                    {!! Form::open(['url' => '/testing/testing', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('testingviews.testing.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
