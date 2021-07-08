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
                    <h1>{{__('Company')}} <small class="text-muted">{{__('Showing all company')}}</small></h1>
                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('Actions')}}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('admin.companys.create') }}">{{__('Create Company')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.card -->

        @if ($companys->count())
            {{ $companys->links() }}
            @foreach ($companys as $company)
                @include('admin.companys.partials.company-card', ['company' => $company])
            @endforeach
        @endif




                {{-- @if ($prospects->count())
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prospects as $prospect)
                                <tr>
                                    <td>{{ $prospect->name }}</td>
                                    <td>{{ $prospect->email }}</td>
                                    <td>{{ $prospect->pretty_created }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif --}}


    </div>
@endsection
