@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')

<div class="add-page">
    <div class="card">
        <div class="card-header listing-header pt-5 border-0">
            <span class="card-label fw-bolder fs-2">Add Permission</span>
        </div>
        <div class="card-body">
            <form action="{{ route('permission.store') }}" method="POST" id="add-permission-form">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Permission Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-solid" placeholder="Permission Name">
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
                                            <input class="form-check-input" name="selectedroles[]" type="checkbox" value="{{ $role->name }}" />
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <label id="selectedroles[]-error" class="invalid-input" for="selectedroles[]" style="display: none;"></label>
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

            <div class="table-responsive mt-5">
                <table class="table table-bordered border-bottom mb-0 datatable-new">
                    <thead>
                        <tr>
                            <th class="sr-col">Sr. No.</th>
                            <th>Permissions Name</th>
                            <th class="action-col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($permissions) > 0)
                            <?php $i = '0' ?>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td class="sr-col">{{ ++$i }}</td>
                                <td>{{ $permission->name }}</td>
                                <td class="action-col">
                                    <div class="action-btn-group">
                                        <a href="{{ route('permission.edit',$permission->id) }}" class="action-btn edit-btn">
                                            <i class="fi fi-rr-pencil icon"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr><td colspan="3" class="no-record">No Record Found</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $("#add-permission-form").validate({
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