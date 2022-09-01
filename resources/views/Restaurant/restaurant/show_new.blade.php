@extends('layouts.design')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex-center">
                        <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                            <i class="fa fa-cog fa-5x text-danger"></i>
                            <a href="/employee-salary" class="font-weight-bold btn btn-link">
                                EmployeeSalary
                            </a>
                        </div>
                        <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                            <i class="fa fa-shopping-bag fa-5x text-primary"></i>
                            <a href="/expenses" class="font-weight-bold btn btn-link">
                                Expenses
                            </a>
                        </div>
                        <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                            <i class="fa fa-clipboard-list fa-5x text-success"></i>
                            <a href="/safe" class="font-weight-bold btn btn-link">
                                Safe
                            </a>
                        </div>
                        <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                            <i class="fa fa-clipboard-list fa-5x text-success"></i>
                            {{-- <i class="fa fa-money fa-5x text-dark" aria-hidden="true"></i> --}}
                            <a href="/total-cash" class="font-weight-bold btn btn-link">
                                TotalCash
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
