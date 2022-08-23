@extends('layouts.frontLayout')
@section('externalCssLinks')
@endsection

@section('customStyle')
@endsection

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <table class="table table-striped" style="color: white;">
            <thead>
                <tr>
                    <th style="text-align: center">#</th>
                    <th style="text-align: center">Title</th>
                    <th style="text-align: center">Description</th>
                </tr>    
            </thead>
            <tbody>
                @php $counter = 0; @endphp
                @foreach($news as $new)
                    <tr>
                        <td style="text-align: center">{{ ++$counter }}</td>
                        <td style="text-align: center">{{ $new->title }}</td>
                        <td style="text-align: center">{{ $new->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-2"></div>

</div>
<table></table>

@endsection

@section('externalJsLinks')
@endsection
@section('pageCustomJS')
@endsection