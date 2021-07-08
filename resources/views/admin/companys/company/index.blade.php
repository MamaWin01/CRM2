@extends('layouts.app')

@section('title', $company->name . '\'s Dashboard')

@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <h1>company Dashboard <small class="text-muted">{{ $company->name }}</small></h1>
            </div>
        </div>
    </div>
@endsection
