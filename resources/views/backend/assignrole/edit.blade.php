@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')

<div class="add-page">
    <div class="card">
        <div class="card-header listing-header pt-5 border-0">
            <span class="card-label fw-bolder fs-2">{{$pageTitle}}</span>
        </div>
        <div class="card-body">
            <form action="{{ route('assignrole.update',$user->id) }}" autocomplete="nope" method="POST" id="edit-user-form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-solid" placeholder="Name" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" autocomplete="off" class="form-control form-control-solid" placeholder="Email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Assign Role<span class="text-danger">*</span></label>
                            <select class="form-select form-select-solid" name="selectedrole">
                                <option value="">Select</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        @foreach ($user->roles as $item)
                                            {{ ($item->id === $role->id) ? 'selected' : '' }}
                                        @endforeach
                                    >
                                    {{ $role->name }}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="buttons-div">
                            <button type="submit" title="Update" class="btn btn-primary">Update</button>
                            <a href="{{ route('assignrole.index') }}" title="Back" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#edit-user-form").validate({
        errorClass: "invalid-input",
        rules: {
            name: { required: true, noSpace : true },
            email: { required: true, email_regex: true },
            selectedrole: { required: true },
        },
        messages: {
            name: "Please Enter Name",
            email: {
                required: "Please Enter Email",
                email_regex: "Please Enter Valid Email"
            },
            selectedrole: "Please Select Assign Role",
        },
        submitHandler: function(form) {
            showLoader()
            form.submit();
        }
    });
</script>
@endsection