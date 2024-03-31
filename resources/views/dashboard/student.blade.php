<div class="add-page">
    <div class="card">
        <div class="card-body pt-5 pb-0">
            <div class="d-flex mb-5 justify-content-between">
                <span class="card-label fw-bolder fs-2"></span>
                <div>
                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary me-2">Edit Profile</a>
                    <a href="{{ route('profile.change.password') }}" class="btn btn-sm btn-danger me-2">Change Password</a>
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
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-gray-900 fs-2 fw-bolder me-1">{{ $student->user->name }}</div>
                                    <div class="btn btn-sm btn-light-primary fw-bolder ms-2 fs-7 py-1 px-3">{{ $student->roll_number }}</div>
                                </div>
                                <div class="d-flex flex-wrap fw-bold fs-6 mb-md-4 pe-2 flex-column flex-md-row">
                                    <a href="tel:{{ $student->phone }}" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                    <span class="svg-icon svg-icon-4 me-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><defs/>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M7.13888889,4 L7.13888889,19 L16.8611111,19 L16.8611111,4 L7.13888889,4 Z M7.83333333,1 L16.1666667,1 C17.5729473,1 18.25,1.98121694 18.25,3.5 L18.25,20.5 C18.25,22.0187831 17.5729473,23 16.1666667,23 L7.83333333,23 C6.42705272,23 5.75,22.0187831 5.75,20.5 L5.75,3.5 C5.75,1.98121694 6.42705272,1 7.83333333,1 Z" fill="#000000" fill-rule="nonzero"/>
                                            <polygon fill="#000000" opacity="0.3" points="7 4 7 19 17 19 17 4"/>
                                            <circle fill="#000000" cx="12" cy="21" r="1"/>
                                        </g>
                                    </svg></span>{{ $student->phone }}</a>
                                    <a href="mailto:{{ $student->user->email }}" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                            <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                        </svg>
                                    </span>{{ $student->user->email }}</a>
                                    <div class="d-flex align-items-center text-gray-400 ms-md-5 ms-0 mb-2">
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black"></path>
                                                <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black"></path>
                                            </svg>
                                        </span>{{ $student->current_address }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gy-5">
                    <div class="col-lg-5">
                        <div class="d-flex flex-wrap flex-stack">
                            <div class="row mb-5 w-100">
                                <label class="col-lg-5 fw-bold fs-6 text-muted">Gender:</label>
                                <div class="col-lg-7">
                                    <span class="fw-bold text-capitalize fs-6 text-gray-600">{{ $student->gender }}</span>
                                </div>
                            </div>
                            <div class="row mb-5 w-100">
                                <label class="col-lg-5 fw-bold fs-6 text-muted">Date of Birth:</label>
                                <div class="col-lg-7">
                                    <span class="fw-bold text-capitalize fs-6 text-gray-600">{{ $student->dateofbirth }}</span>
                                </div>
                            </div>
                            <div class="row mb-5 w-100">
                                <label class="col-lg-5 fw-bold fs-6 text-muted">Permanent Address:</label>
                                <div class="col-lg-7">
                                    <span class="fw-bold text-capitalize fs-6 text-gray-600">{{ $student->permanent_address }}</span>
                                </div>
                            </div>
                            <div class="row mb-5 w-100">
                                <label class="col-lg-5 fw-bold fs-6 text-muted">Class:</label>
                                <div class="col-lg-7">
                                    <span class="fw-bold text-capitalize fs-6 text-gray-600">{{ $student->class->class_name }}</span>
                                </div>
                            </div>
                            <div class="row mb-5 w-100">
                                <label class="col-lg-5 fw-bold fs-6 text-muted">Parent Name:</label>
                                <div class="col-lg-7">
                                    <span class="fw-bold text-capitalize fs-6 text-gray-600">{{ $student->parent->user->name }}</span>
                                </div>
                            </div>
                            <div class="row mb-5 w-100">
                                <label class="col-lg-5 fw-bold fs-6 text-muted">Parent Email:</label>
                                <div class="col-lg-7">
                                    <span class="fw-bold fs-6 text-gray-600"><a href="mailto:{{ $student->parent->user->email }}" class="text-hover-primary" >{{ $student->parent->user->email }}</a></span>
                                </div>
                            </div>
                            <div class="row mb-5 w-100">
                                <label class="col-lg-5 fw-bold fs-6 text-muted">Parent Phone:</label>
                                <div class="col-lg-7">
                                    <span class="fw-bold fs-6 text-gray-600"><a href="tel:{{ $student->parent->phone }}" class="text-hover-primary" >{{ $student->parent->phone }}</a></span>
                                </div>
                            </div>
                            <div class="row w-100">
                                <label class="col-lg-5 fw-bold fs-6 text-muted">Parent Address:</label>
                                <div class="col-lg-7">
                                    <span class="fw-bold text-capitalize fs-6 text-gray-600">{{ $student->parent->current_address }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="table-responsive">
                            <table class="table table-bordered border-bottom datatable-new">
                                <thead>
                                    <tr>
                                        <th class="sr-col">Sr. No.</th>
                                        <th style="width:100px">Code</th>
                                        <th style="min-width:140px">Subject</th>
                                        <th style="min-width:140px">Teacher</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($student->class->subjects) > 0)
                                        <?php $i = '0' ?> 
                                        @foreach ($student->class->subjects as $subject)
                                        <tr>
                                            <td class="sr-col">{{ ++$i }}</td>
                                            <td>{{ $subject->subject_code }}</td>
                                            <td>{{ $subject->name }}</td>
                                            <td>{{ $subject->teacher->user->name }}</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr><td colspan="4" class="no-record">No Record Found</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered border-bottom datatable-new">
                                <thead>
                                    <tr>
                                        <th class="sr-col">Sr. No.</th>
                                        <th style="width:100px">Date</th>
                                        <th style="min-width:140px">Class</th>
                                        <th style="min-width:140px">Teacher</th>
                                        <th style="min-width:100px">Attendance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($student->attendances) > 0)
                                        <?php $i = '0' ?> 
                                        @foreach ($student->attendances as $attendance)
                                        <tr>
                                            <td class="sr-col">{{ ++$i }}</td>
                                            <td>{{ $attendance->attendence_date }}</td>
                                            <td>{{ $attendance->class->class_name }}</td>
                                            <td>{{ $attendance->teacher->user->name }}</td>
                                            <td>
                                                @if($attendance->attendence_status)
                                                    <span class="btn btn-sm btn-success fw-bolder ms-2 fs-7 py-1 px-3">P</span>
                                                @else
                                                    <span class="btn btn-sm btn-danger fw-bolder ms-2 fs-7 py-1 px-3">A</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr><td colspan="5" class="no-record">No Record Found</td></tr>
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