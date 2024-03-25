<div class="w-full block mt-3 mb-8">
    <div class="row">
        <div class="col-lg-4">
            <div class="card bg-dark">
                <div class="card-body d-flex align-items-center justify-content-center flex-column gap-3">
                    <h4 class="text-gray-100 fw-bolder fs-1">{{ sprintf("%02d", $parents->children_count) }}</h4>
                    <h5 class="fw-bold text-gray-100 fs-2">Children</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w-full block mt-4 sm:mt-8">
    <div class="row">
        @foreach ($parents->children as $key => $children)
            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="fw-bolder text-gray-900 fs-4 mb-3">{{ $children->user->name }}</h4>
                        <a href="mailto:{{ $children->user->email }}" class="d-flex align-items-center text-gray-700 fw-medium text-hover-primary mb-2">
                            <span class="svg-icon svg-icon-4 me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                    <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                </svg>
                        </span>{{ $children->user->email }}</a>
                        <div class="d-flex flex-column gap-2">
                            <div class="flex items-center gap-3">
                                <div class="fw-bolder text-gray-800 fs-6">Class :</div>
                                <div class="fw-bold text-gray-700 fs-6">{{ $children->class->class_name }}</div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="fw-bolder text-gray-800 fs-6">Role :</div>
                                <div class="fw-bold text-gray-700 fs-6">{{ $children->roll_number }}</div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="fw-bolder text-gray-800 fs-6">Phone :</div>
                                <div class="fw-bold text-gray-700 fs-6">{{ $children->phone }}</div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="fw-bolder text-gray-800 fs-6">Gender :</div>
                                <div class="fw-bold text-gray-700 fs-6">{{ $children->gender }}</div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="fw-bolder text-gray-800 fs-6">Date of Birth :</div>
                                <div class="fw-bold text-gray-700 fs-6">{{ $children->dateofbirth }}</div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="fw-bolder text-gray-800 fs-6">Address :</div>
                                <div class="fw-bold text-gray-700 fs-6">{{ $children->current_address }}</div>
                            </div>

                            <div class="d-flex">
                                <a href="{{ route('attendance.show',$children->id) }}" class="btn btn-primary btn-sm">Attendence</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- <div class="flex flex-wrap sm:flex-no-wrap justify-between">
        @foreach ($parents->children as $key => $children)
            <div class="w-full bg-gray-200 text-center border border-gray-300 rounded px-8 py-6 mb-4 {{ ($key>=1) ? 'ml-0 sm:ml-2' : '' }} {{ ($parents->children_count===1) ? 'sm:max-w-sm' : '' }}">
                <div class="text-gray-700 font-bold">
                    <div class="mb-6">
                        <div class="text-lg uppercase">{{ $children->user->name }}</div>
                        <div class="text-sm lowercase leading-tight">{{ $children->user->email }}</div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="w-1/2 text-sm text-right">Class :</div>
                        <div class="w-1/2 text-sm text-left ml-2">{{ $children->class->class_name }}</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="w-1/2 text-sm text-right">Role :</div>
                        <div class="w-1/2 text-sm text-left ml-2">{{ $children->roll_number }}</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="w-1/2 text-sm text-right">Phone :</div>
                        <div class="w-1/2 text-sm text-left ml-2">{{ $children->phone }}</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="w-1/2 text-sm text-right">Gender :</div>
                        <div class="w-1/2 text-sm text-left ml-2">{{ $children->gender }}</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="w-1/2 text-sm text-right">Date of Birth :</div>
                        <div class="w-1/2 text-sm text-left ml-2">{{ $children->dateofbirth }}</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="w-1/2 text-sm text-right">Address :</div>
                        <div class="w-1/2 text-sm text-left ml-2">{{ $children->current_address }}</div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('attendance.show',$children->id) }}" class="bg-gray-100 inline-block mb-4 text-xs text-gray-600 uppercase font-semibold px-4 py-2 border border-gray-400 rounded">Attendence</a>
                        <a href="{{ route('teacher.attendance.create',$children->id) }}" class="bg-gray-100 inline-block mb-4 text-xs text-gray-600 uppercase font-semibold px-4 py-2 border border-gray-400 rounded">Fees</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div> --}}
</div> <!-- ./END PARENT -->