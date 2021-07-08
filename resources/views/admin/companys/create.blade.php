@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex">
                    <h1>{{__('Create Company')}}</h1>

                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('Actions')}}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('admin.companys.dashboard') }}">{{__('Home')}}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                @if ($errors->count())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                <form action="{{ route('admin.companys.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name" style="font-family:Arial; opacity:85%; color:rgba(170, 170, 170, 0.925);">{{__('Name')}}</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{__('Insert Name')}}" style="font-family:Arial; opacity:85%;" value="{{ old('name')}}">
                        @error('name')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback" style="font-size:15px">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" style="font-family:Arial; opacity:90%; color:rgba(170, 170, 170, 0.925);">{{__('Email')}}</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('Insert Email')}}" style="font-family:Arial; opacity:85%;" value="{{ old('Email')}}">
                        @error('email')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback" style="font-size:15px">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{__('Image')}}</label>
                        <input type="file" class="form-control-file btn-light" id="logo "alt="Image Failed to Load">
                        @error('logo')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback" style="font-size:15px">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="website" style="font-family:Arial; opacity:90%; color:rgba(170, 170, 170, 0.925);">{{__('Company Website')}}</label>
                        <input class="form-control @error('website') is-invalid @enderror" id="website" name="website" placeholder="{{__('Insert Company Website')}}" type="text" style="font-family:Arial; opacity:90%; color:rgba(170, 170, 170, 0.925);"value="{{ old('website')}}">
                        @error('website')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback" style="font-size:15px">{{ $message }}</div>
                        @enderror
                    </div>

                        <button class="btn btn-primary " name="submit" type="submit" style="font-family:Arial; opacity:90%;">{{__('Submit')}}</button>
                    </form>
                </form>

            </div>
        </div>
    </div>
@endsection
