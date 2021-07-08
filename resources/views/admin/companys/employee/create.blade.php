@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex">
                    <h1>{{__('Create Employee Details')}} <small class="text-muted">{{ $company->name }}</small></h1>
                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('Actions')}}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('admin.companys.dashboard') }}">{{__('View Company')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.card -->

        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ route('admin.companys.employee.store', $company->id) }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-md-3">{{__('First Name')}}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="first_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">{{__('Last Name')}}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="last_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">{{__('Company')}}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="company">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">{{__('Email')}}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">{{__('Phone')}}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone">
                        </div>
                    </div>
                    <button class="btn btn-primary float-right">{{__('Create Employee Details')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
