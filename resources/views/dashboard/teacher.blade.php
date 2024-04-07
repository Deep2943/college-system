<div class="w-full block mt-3 mb-8">
    <div class="row">
        <div class="col-lg-4">
            <div class="card bg-dark">
                <div class="card-body d-flex align-items-center justify-content-center flex-column gap-3">
                    <h4 class="text-gray-100 fw-bolder fs-1">{{ sprintf("%02d", $teacher->classes_count) }}</h4>
                    <h5 class="fw-bold text-gray-100 fs-2">Classes</h5>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-dark">
                <div class="card-body d-flex align-items-center justify-content-center flex-column gap-3">
                    <h4 class="text-gray-100 fw-bolder fs-1">{{ sprintf("%02d", $teacher->subjects_count) }}</h4>
                    <h5 class="fw-bold text-gray-100 fs-2">Subjects</h5>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-dark">
                <div class="card-body d-flex align-items-center justify-content-center flex-column gap-3">
                    <h4 class="text-gray-100 fw-bolder fs-1">{{ ($teacher->students[0]->students_count) ?? 0 }}</h4>
                    <h5 class="fw-bold text-gray-100 fs-2">Students</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="w-full block mt-8">
    <div class="flex flex-wrap sm:flex-no-wrap justify-between">
        <div class="row w-100">
            <div class="col-lg-12">
                <h4 class="text-gray-900 fw-bolder fs-2 mb-5">Class List</h4>
            </div>
            @foreach ($teacher->classes as $class)
            <div class="col-lg-4">
                <div class="card mb-5 shadow">
                    <div class="card-body d-flex align-items-center justify-content-center flex-column gap-3">
                        <h4 class="text-gray-900 fw-bolder fs-4 text-center">{{ $class->class_name }}</h4>
                        <a href="{{ route('teacher.attendance.create',$class->id) }}" class="btn btn-sm btn-primary">Attendance</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="w-full mt-8">
            <h4 class="text-gray-900 fw-bolder fs-2 mb-5">Subject List</h4>
            <div>
                <div class="table-responsive">
                    <table class="table table-bordered border-bottom datatable-new">
                        <thead>
                            <tr>
                                <th class="sr-col">Sr. No.</th>
                                <th>Code</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($teacher->subjects) > 0)
                            <?php $i = '0' ?>
                                @foreach ($teacher->subjects as $subject)
                                <tr>
                                    <td class="sr-col">{{ ++$i }}</td>
                                    <td>{{ $subject->subject_code }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->teacher->user->name }}</td>
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
</div> <!-- ./END TEACHER -->