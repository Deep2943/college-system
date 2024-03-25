@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')

<div class="add-page">
    <div class="card">
        <div class="card-header listing-header pt-5 border-0">
            <span class="card-label fw-bolder fs-2">{{ $pageTitle }}</span>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.update') }}" autocomplete="nope" method="POST" id="edit-profile-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="symbol symbol-100px symbol-circle border-1 mb-4">
                            <img src="{{ asset('images/profile/' . auth()->user()->profile_picture) }}" alt="image">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-solid" placeholder="Name" value="{{ auth()->user()->name }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" autocomplete="off" class="form-control form-control-solid" placeholder="Email" value="{{ auth()->user()->email }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Picture</label>
                            <input type="file" name="profile_picture" class="form-control form-control-solid">
                            <label id="profile_picture-error" class="invalid-input" for="profile_picture" style="display: none"></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="buttons-div">
                            <button type="submit" title="Update" class="btn btn-primary">Update</button>
                            <a href="{{ route('home') }}" title="Back" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#edit-profile-form").validate({
        errorClass: "invalid-input",
        rules: {
            name: { required: true, noSpace : true },
            email: { required: true, email_regex: true },
            profile_picture: { required: false },
        },
        messages: {
            name: "Please Enter Name",
            email: {
                required: "Please Enter Email",
                email_regex: "Please Enter Valid Email"
            },
            profile_picture: "Please Upload Picture",
        },
        submitHandler: function(form) {
            showLoader()
            form.submit();
        }
    });
</script>
@endsection