@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex">
                <h1>Employee <small class="text-muted">{{__('Showing Employee List')}}</small></h1>
                <div class="ml-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('Actions')}}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('admin.companys.dashboard') }}">{{__('Home')}}</a>
                            <a class="dropdown-item" href="{{ route('employee.create', $company->id) }}">{{__('Create Employee')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.card -->

    <div class="container mt-3">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Company</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($employee as $emp)
                        <tr>
                            <th scope="row">{{ $loop ->iteration}}</th>
                            <td>{{ $emp ->first_name }}</td>
                            <td>{{ $emp ->last_name }}</td>
                            <td>{{ $emp ->email }}</td>
                            <td>{{ $emp ->company }}</td>
                            <td>{{ $emp ->phone }}</td>
                            <td class="span">
                                <a href="/employee/{employee}/edit" class="badge bg-success">Edit</a>
                                <a href="/add" class="badge bg-danger">Delete</a>
                        </td>
                        </tr>
                    @endforeach
              </tr>
            </tbody>
          </table>
    </div>
{{--
    @if ($employees->count())
        {{ $employees->links() }}
        @foreach($employees->employee)
            @include('admin.companys.employee.partials.employee-card', ['company_id' => $company->id, 'employee' => $company->employee])
        @endforeach
    @endif --}}
    {{-- <div class="card mt-3">
        <div class="card-body">
            <h5>{{__('Employee List')}}</h5>
            <hr>
            @if ($company->employee)
                @include('admin.companys.employee.partials.employee-card', ['company_id' => $company->id, 'employee' => $company->employee])
            @else
                <div class="d-flex">
                    <div class="mx-auto">
                        <a href="{{ route('admin.companys.employee.create', $company->id) }}" class="btn btn-outline-primary">{{__('Create Employee Detail')}}</a>
                    </div>
                </div>
            @endif
        </div>
    </div> --}}


@endsection
