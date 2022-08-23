@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Fill</h3>
                    @can('view-'.str_slug('Fill'))
                        <a class="btn btn-success pull-right" href="{{url('/fill')}}">
                            <i class="icon-arrow-left-circle"></i> View Fill</a>
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

                    {!! Form::open(['url' => '/fill', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('fill.fill.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
