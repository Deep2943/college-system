@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')
<div class="add-page">
    <div class="card">
        <div class="card-header listing-header pt-5 border-0">
            <span class="card-label fw-bolder fs-2">Edit Class</span>
        </div>
        <div class="card-body">
            <form action="{{ route('classes.update',$class->id) }}" method="POST" id="edit-class-form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Class Name<span class="text-danger">*</span></label>
                            <input type="text" name="class_name" class="form-control form-control-solid" placeholder="Class Name" value="{{ $class->class_name }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Class Numeric<span class="text-danger">*</span></label>
                            <input type="text" name="class_numeric" onkeyup="onlyNumber(this)" class="form-control form-control-solid" placeholder="Class Numeric" value="{{ $class->class_numeric }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Assign Teacher<span class="text-danger">*</span></label>
                            <select class="form-select form-select-solid" name="teacher_id">
                                <option value="">Select</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}"
                                        {{ ($teacher->id === $class->teacher_id) ? 'selected' : '' }}>
                                        {{ $teacher->user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Class Description<span class="text-danger">*</span></label>
                            <textarea name="class_description" rows="3" class="form-control form-control-solid" placeholder="Class Description">{{ $class->class_description }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="buttons-div">
                            <button type="submit" title="Update" class="btn btn-primary">Update</button>
                            <a href="{{ route('classes.index') }}" title="Back" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#edit-class-form").validate({
        errorClass: "invalid-input",
        rules: {
            class_name: { required: true, noSpace : true },
            class_numeric: { required: true },
            teacher_id: { required: true },
            class_description: { required: true },
        },
        messages: {
            class_name: "Please Enter Class Name",
            class_numeric: "Please Enter Class Numeric",
            teacher_id: "Please Select Assign Teacher",
            class_description: "Please Enter Class Description",
        },
        submitHandler: function(form) {
            showLoader()
            form.submit();
        }
    });
</script>
@endsection