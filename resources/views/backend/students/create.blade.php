@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')

<div class="add-page">
    <div class="card">
        <div class="card-header listing-header pt-5 border-0">
            <span class="card-label fw-bolder fs-2">{{ $pageTitle }}</span>
        </div>
        <div class="card-body">
            <form action="{{ route('student.store') }}" autocomplete="nope" method="POST" id="add-student-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-solid" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" autocomplete="off" class="form-control form-control-solid" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" autocomplete="cc-number" minlength="8" class="form-control form-control-solid" placeholder="Password">
                            <div class="form-text">Your Password Must Be Minimum 8 Characters Long</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Roll Number<span class="text-danger">*</span></label>
                            <input type="text" name="roll_number" class="form-control form-control-solid" onkeyup="onlyNumber(this)" placeholder="Roll Number">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Phone<span class="text-danger">*</span></label>
                            <input type="text" name="phone" onkeyup="onlyNumber(this)" maxlength="10" class="form-control form-control-solid" placeholder="Phone">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-5">Gender<span class="text-danger">*</span></label>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" id="male" name="gender" value="male" />
                                    <label class="fw-bold fs-6 ml-2" for="male">Male</label>
                                </span>
                                <span class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" />
                                    <label class="fw-bold fs-6 ml-2" for="female">Female</label>
                                </span>
                                <span class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" name="gender" id="other" value="other" />
                                    <label for="other" class="fw-bold fs-6 ml-2">Other</label>
                                </span>
                            </div>
                            <label id="gender-error" class="invalid-input" for="gender" style="display: none"></label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Date of Birth<span class="text-danger">*</span></label>
                            <input type="text" name="dateofbirth" id="datepicker-tc" class="form-control form-control-solid" autocomplete="nope" placeholder="YYYY-MM-DD">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Current Address<span class="text-danger">*</span></label>
                            <textarea name="current_address" rows="3" class="form-control form-control-solid" placeholder="Current Address"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Permanent Address<span class="text-danger">*</span></label>
                            <textarea name="permanent_address" rows="3" class="form-control form-control-solid" placeholder="Permanent Address"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Assign Class<span class="text-danger">*</span></label>
                            <select class="form-select form-select-solid" name="class_id">
                                <option value="">Select</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Parent Name<span class="text-danger">*</span></label>
                            <select class="form-select form-select-solid" name="parent_id">
                                <option value="">Select</option>
                                @foreach ($parents as $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bolder fs-6 mb-2">Picture<span class="text-danger">*</span></label>
                            <input type="file" name="profile_picture" class="form-control form-control-solid" placeholder="YYYY-MM-DD">
                            <label id="profile_picture-error" class="invalid-input" for="profile_picture" style="display: none"></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="buttons-div">
                            <button type="submit" title="Submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('student.index') }}" title="Back" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#add-student-form").validate({
        errorClass: "invalid-input",
        rules: {
            name: { required: true, noSpace : true },
            email: { required: true },
            password: { required: true },
            phone: { required: true },
            gender: { required: true },
            roll_number: {required: true},
            dateofbirth: { required: true },
            class_id: { required: true },
            parent_id: { required: true },
            current_address: { required: true },
            permanent_address: { required: true },
            profile_picture: { required: true },
        },
        messages: {
            name: "Please Enter Name",
            email: "Please Enter Email",
            password: "Please Enter Password",
            phone: "Please Enter Phone",
            gender: "Please Select Gender",
            dateofbirth: "Please Select Date of Birth",
            roll_number: "Please Enter Roll Number",
            class_id: "Please Select Assign Class",
            parent_id: "Please Select Parent Name",
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
            showClose: true,
            showClear: true,
            icons: {
                close: 'fa fa-close',
                clear: 'fa fa-trash'
            }
        });
    })
</script>
@endpush