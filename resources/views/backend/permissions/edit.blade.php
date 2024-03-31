@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')

<div class="add-page">
    <div class="card">
        <div class="card-header listing-header pt-5 border-0">
            <span class="card-label fw-bolder fs-2">Edit Permission</span>
        </div>
        <div class="card-body">
            <form action="{{ route('permission.update',$permission->id) }}" method="POST" id="edit-permission-form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Permission Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-solid" placeholder="Permission Name" value="{{ $permission->name }}">
                        </div>
                    </div>
                    <div class="col-lg-8"></div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="fw-bold fs-6">Roles<span class="text-danger">*</span></label>
                            <div class="checkbox-list">
                                @foreach ($roles as $role)
                                    <div class="pb-4 custom-checkbox border-bottom pt-4">
                                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                            <span class="form-check-label text-gray-700 fs-6 fw-bold ms-0 me-2">{{ $role->name }}</span>
                                            <input class="form-check-input" name="selectedroles[]" type="checkbox" value="{{ $role->name }}"
                                                @foreach ($permission->roles as $item)
                                                    {{ ($item->id === $role->id) ? 'checked' : '' }}
                                                @endforeach />
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <label id="selectedroles[]-error" class="invalid-input" for="selectedroles[]" style="display: none;"></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="buttons-div">
                            <button type="submit" title="Update" class="btn btn-primary">Update</button>
                            <a href="{{ route('roles-permissions') }}" title="Back" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#edit-permission-form").validate({
        errorClass: "invalid-input",
        rules: {
            name: { required: true, noSpace : true },
            'selectedroles[]': { required: true },
        },
        messages: {
            name: "Please Enter Permission Name",
            'selectedroles[]': "Please Select Roles",
        },
        submitHandler: function(form) {
            showLoader()
            form.submit();
        }
    });
</script>
@endsection