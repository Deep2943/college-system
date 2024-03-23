@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')

<div class="add-page">
    <div class="card">
        <div class="card-header listing-header pt-5 border-0">
            <span class="card-label fw-bolder fs-2">{{$pageTitle}}</span>
        </div>
        <div class="card-body">
            <form action="{{ route('assignrole.store') }}" method="POST" id="add-user-form">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-solid" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" class="form-control form-control-solid" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" autocomplete="cc-number" minlength="8" class="form-control form-control-solid" placeholder="Password">
                            <div class="form-text">Your Password Must Be Minimum 8 Characters Long</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Assign Role<span class="text-danger">*</span></label>
                            <select class="form-select form-select-solid" name="role">
                                <option value="">Select</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="buttons-div">
                            <button type="submit" title="Submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('assignrole.index') }}" title="Back" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#add-user-form").validate({
        errorClass: "invalid-input",
        rules: {
            name: { required: true, noSpace : true },
            email: { required: true, email_regex: true },
            password: { required: true },
            role: { required: true },
        },
        messages: {
            name: "Please Enter Name",
            email: {
                required: "Please Enter Email",
                email_regex: "Please Enter Valid Email"
            },
            password: "Please Enter Password",
            role: "Please Select Assign Role",
        },
        submitHandler: function(form) {
            showLoader()
            form.submit();
        }
    });
</script>
@endsection