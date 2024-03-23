@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')

<div class="main-listing-page">
    <div class="card">
        <div class="card-header listing-header pt-5 border-0">
            <span class="card-label fw-bolder fs-2">{{ $pageTitle }}</span>
        </div>
        <div class="card-body">
            <form action="{{ route('attendance.index') }}" method="GET" id="generate-attend-form">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-5">Report Type</label>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" name="type" value="class" checked />
                                    <label class="fw-bold fs-6 ml-2" for="class">Class</label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Month<span class="text-danger">*</span></label>
                            <select class="form-select form-select-solid" name="month">
                                <option value="">Select</option>
                                @foreach ($months as $month => $values)
                                    <option value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 pt-8">
                        <div class="form-group">
                            <button type="submit" title="Submit" class="btn btn-primary">Generate</button>
                            <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </div>
                </div>
            </form>

            <div class="w-full pt-5">
                @foreach ($attendances as $classid => $datevalues)
                    <h2 class="bg-gray-300 text-gray-500 font-semibold uppercase px-4 py-3">
                        class {{ $classid }}
                    </h2>
                    <div class="flex flex-col bg-gray-200 mb-6">
                        @foreach ($datevalues as $key => $attendancevals)
                            <div class="text-left text-gray-600 py-2 px-4 font-semibold">
                                <span >{{ $key }}</span>
                                <div class="flex flex-col justify-between bg-gray-100">
                                    @foreach ($attendancevals as $vals => $attendance)
                                        <div class="flex flex-row justify-between w-64">
                                            <div class="text-sm text-left text-gray-600 py-2 px-4 font-semibold">{{ $attendance->student->user->name }}</div>
                                            <div class="text-sm text-left text-gray-600 py-2 px-4 font-semibold">
                                                @if ($attendance->attendence_status)
                                                    <span class="text-xs text-white bg-green-500 px-2 py-1 rounded">P</span>
                                                @else
                                                    <span class="text-xs text-white bg-red-500 px-2 py-1 rounded">A</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    $("#generate-attend-form").validate({
        errorClass: "invalid-input",
        rules: {
            month: { required: true }
        },
        messages: {
            month: "Please Select Month",
        },
        submitHandler: function(form) {
            showLoader()
            form.submit();
        }
    });
</script>
@endsection