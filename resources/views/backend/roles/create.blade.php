@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')

<div class="add-page">
    <div class="card">
        <div class="card-header listing-header pt-5 border-0">
            <span class="card-label fw-bolder fs-2">Add Role</span>
        </div>
        <div class="card-body">
            <form action="{{ route('role.store') }}" method="POST" id="add-role-form">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Role Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-solid" placeholder="Role Name">
                        </div>
                    </div>
                    <div class="col-lg-8"></div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="fw-bold fs-6">Permissions<span class="text-danger">*</span></label>
                            <div class="checkbox-list">
                                @foreach ($permissions as $permission)
                                    <div class="pb-4 custom-checkbox border-bottom pt-4">
                                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                            <span class="form-check-label text-gray-700 fs-6 fw-bold ms-0 me-2">{{ $permission->name }}</span>
                                            <input class="form-check-input" name="selectedpermissions[]" type="checkbox" value="{{ $permission->name }}" />
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <label id="selectedpermissions[]-error" class="invalid-input" for="selectedpermissions[]" style="display: none;"></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="buttons-div">
                            <button type="submit" title="Submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('roles-permissions') }}" title="Back" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#add-role-form").validate({
        errorClass: "invalid-input",
        rules: {
            name: { required: true, noSpace : true },
            'selectedpermissions[]': { required: true },
        },
        messages: {
            name: "Please Enter Role Name",
            'selectedpermissions[]': "Please Select Permissions",
        },
        submitHandler: function(form) {
            showLoader()
            form.submit();
        }
    });
</script>
@endsection