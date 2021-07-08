@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex">
                <h1>{{__('Edit Company')}} <small class="text-muted">{{ $company->name }}</small></h1>
                <div class="ml-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{ route('admin.companys.dashboard') }}">View Dashboard</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item text-danger" href="#" onclick="deletecompany()">Delete company</a>
                            <form action="{{ route('admin.companys.delete', $company->id) }}" id="delete-company-form" style="display:none" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Update their name and email and profile image --}}
    <div class="row">
        <div class="col-md-4 offset-md-0 col-sm-8 offset-sm-2">
            {{-- Placeholder for image and option to change out just the image --}}
            <div class="card mt-3">
                <div class="card-body">
                    @if ($company->profile_image)
                        <img src="{{ Storage::url($company->profile_image) }}" style="max-width: 100%" alt="">
                    @else
                        <img src="/images/user.png" style="max-width: 100%" alt="">
                    @endif
                    <hr>
                    <button class="btn btn-outline-primary btn-sm btn-block" data-toggle="modal" data-target="#updateProfileImageModal">New Profile Image</button>
                    @if ($company->profile_image)
                        <button class="btn btn-outline-danger btn-sm btn-block" onclick="deleteProfileImage()"><i class="fas fa-trash"></i> Delete Profile Image</button>
                        <form action="{{ route('admin.companys.delete.profile-image', $company->id) }}" method="POST" id="delete-profile-image-form">
                            @csrf
                            @method('DELETE')
                        </form>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-body">
                    <h5>Edit Company Details</h5>
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

                    <form action="{{ route('admin.companys.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $company->name }}">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $company->email }}">
                        </div>

                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="website" class="form-control" name="website" value="{{ $company->website }}">
                        </div>

                        <button class="btn btn-primary float-right">Update company</button>
                    </form>
                </div>
            </div><!-- /.card company details-->

            <div class="card mt-3">
                <div class="card-body">
                    <h5>Edit Employee Details</h5>
                    <hr>
                    @if ($company->employee)
                        @include('admin.companys.employee.partials.edit-employee-form', ['company_id' => $company->id, 'employee' => $company->employee])
                    @else
                        <div class="d-flex">
                            <div class="mx-auto">
                                <a href="{{ route('admin.companys.employee.create', $company->id) }}" class="btn btn-outline-primary">Create Employee Details</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for updating profile image-->
<div class="modal fade" id="updateProfileImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.companys.update.profile-image', $company->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="">Choose an Image</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>

                    <button class="btn btn-primary float-right">Update Profile Image</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer-scripts')
    <script>
        function deleteProfileImage() {
            var r = confirm("Are you sure you want to delete the profile image?")

            if (r) {
                document.querySelector('form#delete-profile-image-form').submit()
            }
        }

        function deletecompany() {
            var r = confirm("Are you sure you want to delete this company? This can't be undone!")

            if (r) {
                document.querySelector('form#delete-company-form').submit()
            }
        }
    </script>
@endpush
