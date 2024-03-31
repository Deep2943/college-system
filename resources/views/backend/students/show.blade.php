@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')

<div class="add-page">
    <div class="card">
        <div class="card-body pt-5 pb-0">
            <div class="d-flex mb-3 justify-content-between">
                <span class="card-label fw-bolder fs-2">Student Details</span>
                <div>
                    <button type="button" onclick="CreatePDFfromHTML()" class="btn btn-sm btn-primary me-2">Download PDF</button>
                    <a href="{{ route('student.index') }}" class="btn btn-sm btn-light me-2">Back</a>
                </div>
            </div>
            <div class="pdf-content pb-5">
                <div class="d-flex flex-wrap flex-sm-nowrap mb-3 align-items-center">
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                            <img src="{{ asset('images/profile/' .$student->user->profile_picture) }}" alt="image" class="object-contain">
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <div class="d-flex flex-column">
                                <!--begin::Name-->
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-gray-900 fs-2 fw-bolder me-1">{{ $student->user->name }}</div>
                                    <div class="btn btn-sm btn-light-primary fw-bolder ms-2 fs-7 py-1 px-3">{{ $student->roll_number }}</div>
                                </div>
                                <!--end::Name-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap fw-bold fs-6 mb-md-4 pe-2 flex-column flex-column">
                                    <a href="tel:{{ $student->phone }}" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">{{ $student->phone }}</a>
                                    <a href="mailto:{{ $student->user->email }}" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">{{ $student->user->email }}</a>
                                    <div class="d-flex align-items-center text-gray-400 ms-0 mb-2">{{ $student->current_address }}</div>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->
                            <!--begin::Actions-->
                            <!--end::Actions-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    
                    <!--end::Info-->
                </div>
                <div class="row gy-5">
                    <div class="col-lg-6">
                        <div class="d-flex flex-wrap flex-stack">
                            <div class="row mb-5 w-100">
                                <label class="col-lg-4 fw-bold fs-6 text-gray-600">Gender:</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold text-capitalize fs-6 text-gray-600">{{ $student->gender }}</span>
                                </div>
                            </div>
                            <div class="row mb-5 w-100">
                                <label class="col-lg-4 fw-bold fs-6 text-gray-600">Date of Birth:</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold text-capitalize fs-6 text-gray-600">{{ $student->dateofbirth }}</span>
                                </div>
                            </div>
                            <div class="row mb-5 w-100">
                                <label class="col-lg-4 fw-bold fs-6 text-gray-600">Permanent Address:</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold text-capitalize fs-6 text-gray-600">{{ $student->permanent_address }}</span>
                                </div>
                            </div>
                            <div class="row mb-5 w-100">
                                <label class="col-lg-4 fw-bold fs-6 text-gray-600">Class:</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold text-capitalize fs-6 text-gray-600">{{ $student->class->class_name }}</span>
                                </div>
                            </div>
                            <div class="row mb-5 w-100">
                                <label class="col-lg-4 fw-bold fs-6 text-gray-600">Parent Name:</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold text-capitalize fs-6 text-gray-600">{{ $student->parent->user->name }}</span>
                                </div>
                            </div>
                            <div class="row mb-5 w-100">
                                <label class="col-lg-4 fw-bold fs-6 text-gray-600">Parent Email:</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-600"><a href="mailto:{{ $student->parent->user->email }}" class="text-hover-primary" >{{ $student->parent->user->email }}</a></span>
                                </div>
                            </div>
                            <div class="row mb-5 w-100">
                                <label class="col-lg-4 fw-bold fs-6 text-gray-600">Parent Phone:</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-600"><a href="tel:{{ $student->parent->phone }}" class="text-hover-primary" >{{ $student->parent->phone }}</a></span>
                                </div>
                            </div>
                            <div class="row w-100">
                                <label class="col-lg-4 fw-bold fs-6 text-gray-600">Parent Address:</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold text-capitalize fs-6 text-gray-600">{{ $student->parent->current_address }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-bordered border-bottom datatable-new">
                                <thead>
                                    <tr>
                                        <th class="sr-col">Sr. No.</th>
                                        <th style="min-width:140px">Subject</th>
                                        <th style="min-width:140px">Teacher</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($class->subjects) > 0)
                                        @foreach ($class->subjects as $subject)
                                        <tr>
                                            <td class="sr-col">{{ ++$i }}</td>
                                            <td>{{ $subject->name }}</td>
                                            <td>{{ $subject->teacher->user->name }}</td>
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
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script>
    function CreatePDFfromHTML() {
        var HTML_Width = $(".pdf-content").width();
        var HTML_Height = $(".pdf-content").height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width + (top_left_margin * 2);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

        html2canvas($(".pdf-content")[0]).then(function (canvas) {
            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
            for (var i = 1; i <= totalPDFPages; i++) { 
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
            }
            pdf.save("{{ $student->user->name }} - Details.pdf");
        });
    }
</script>
@endsection