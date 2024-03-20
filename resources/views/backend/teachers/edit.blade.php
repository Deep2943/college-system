@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')

<div class="add-page">
    <div class="card">
        <div class="card-header listing-header pt-5 border-0">
            <span class="card-label fw-bolder fs-2">Edit Teacher</span>
        </div>
        <div class="card-body">
            <form action="{{ route('teacher.update',$teacher->id) }}" autocomplete="nope" method="POST" id="edit-teacher-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="symbol symbol-100px symbol-circle border-1 mb-4">
                            <img src="{{ asset('images/profile/' .$teacher->user->profile_picture) }}" alt="image">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-solid" placeholder="Name" value="{{ $teacher->user->name }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" autocomplete="off" class="form-control form-control-solid" placeholder="Email" value="{{ $teacher->user->email }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Phone<span class="text-danger">*</span></label>
                            <input type="text" name="phone" onkeyup="onlyNumber(this)" maxlength="10" class="form-control form-control-solid" placeholder="Phone" value="{{ $teacher->phone }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-5">Gender<span class="text-danger">*</span></label>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" id="male" {{ ($teacher->gender == 'male') ? 'checked' : '' }} name="gender" value="male" />
                                    <label class="fw-bold fs-6 ml-2" for="male">Male</label>
                                </span>
                                <span class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" name="gender" {{ ($teacher->gender == 'female') ? 'checked' : '' }} id="female" value="female" />
                                    <label class="fw-bold fs-6 ml-2" for="female">Female</label>
                                </span>
                                <span class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" name="gender" {{ ($teacher->gender == 'other') ? 'checked' : '' }} id="other" value="other" />
                                    <label for="other" class="fw-bold fs-6 ml-2">Other</label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Date of Birth<span class="text-danger">*</span></label>
                            <input type="text" name="dateofbirth" id="datepicker-tc" value="{{ $teacher->dateofbirth }}" class="form-control form-control-solid" autocomplete="nope" placeholder="YYYY-MM-DD">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Current Address<span class="text-danger">*</span></label>
                            <textarea name="current_address" rows="3" class="form-control form-control-solid" placeholder="Current Address">{{ $teacher->current_address }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Permanent Address<span class="text-danger">*</span></label>
                            <textarea name="permanent_address" rows="3" class="form-control form-control-solid" placeholder="Permanent Address">{{ $teacher->permanent_address }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Picture</label>
                            <input type="file" name="profile_picture" class="form-control form-control-solid" placeholder="YYYY-MM-DD">
                            <label id="profile_picture-error" class="invalid-input" for="profile_picture" style="display: none"></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="buttons-div">
                            <button type="submit" title="Update" class="btn btn-primary">Update</button>
                            <a href="{{ route('teacher.index') }}" title="Back" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#edit-teacher-form").validate({
        errorClass: "invalid-input",
        rules: {
            name: { required: true, noSpace : true },
            email: { required: true },
            phone: { required: true },
            gender: { required: true },
            dateofbirth: { required: true },
            current_address: { required: true },
            permanent_address: { required: true },
            profile_picture: { required: false },
        },
        messages: {
            name: "Please Enter Name",
            email: "Please Enter Email",
            phone: "Please Enter Phone",
            gender: "Please Select Gender",
            dateofbirth: "Please Select Date of Birth",
            current_address: "Please Enter Current Address",
            permanent_address: "Please Enter Permanent Address",
            profile_picture: "Please Upload Picture",
        },
        submitHandler: function(form) {
            showLoader()
            form.submit();
        }
    });
</script>
@endsection

@push('scripts')
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $(function() {   
        $('#datepicker-tc').datetimepicker({
            useCurrent: false,
            ignoreReadonly: true,
            viewMode: 'days',
            format: 'YYYY-MM-DD',
        });
    })
</script>
@endpush