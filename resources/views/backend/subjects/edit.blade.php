@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')
<div class="add-page">
    <div class="card">
        <div class="card-header listing-header pt-5 border-0">
            <span class="card-label fw-bolder fs-2">Edit Subject</span>
        </div>
        <div class="card-body">
            <form action="{{ route('subject.update',$subject->id) }}" method="POST" id="edit-subject-form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Subject Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-solid" placeholder="Subject Name" value="{{ $subject->name }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Subject Code<span class="text-danger">*</span></label>
                            <input type="text" name="subject_code" onkeyup="onlyNumber(this)" class="form-control form-control-solid" placeholder="Subject Code" value="{{ $subject->subject_code }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Assign Teacher<span class="text-danger">*</span></label>
                            <select class="form-select form-select-solid" name="teacher_id">
                                <option value="">Select</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}"
                                        {{ ($teacher->id === $subject->teacher_id) ? 'selected' : '' }}
                                    >
                                        {{ $teacher->user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Subject Description<span class="text-danger">*</span></label>
                            <textarea name="description" rows="3" class="form-control form-control-solid" placeholder="Subject Description">{{ $subject->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="buttons-div">
                            <button type="submit" title="Update" class="btn btn-primary">Update</button>
                            <a href="{{ route('subject.index') }}" title="Back" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#edit-subject-form").validate({
        errorClass: "invalid-input",
        rules: {
            name: { required: true, noSpace : true },
            subject_code: { required: true },
            teacher_id: { required: true },
            description: { required: true },
        },
        messages: {
            name: "Please Enter Subject Name",
            subject_code: "Please Enter Subject Code",
            teacher_id: "Please Select Assign Teacher",
            description: "Please Enter Subject Description",
        },
        submitHandler: function(form) {
            showLoader()
            form.submit();
        }
    });
</script>
@endsection