@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')

<link rel="stylesheet" href="{{ asset('css/data-table.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/fixedheader.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/datatables-bootstrap5.min.js') }}">
<script src="{{ asset('js/datatables.min.js') }}"></script>

<div class="main-listing-page">
    <div class="card">
        <div class="card-header listing-header pt-5 border-0">
            <span class="card-label fw-bolder fs-2">Classes<span class="text-gray-900 fs-5">({{ sprintf(count($classes)) }})</span></span>
            <a href="{{ route('classes.create') }}" class="btn btn-primary btn-sm listing-add-btn">
                <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"> <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" /> <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" /> </svg></span>
                Add Class
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered datatable-new" id="classes-table">
                    <thead>
                        <tr>
                            <th class="sr-col">Sr. No.</th>
                            <th>Name</th>
                            <th>Students</th>
                            <th>Assigned Subject</th>
                            <th>Teacher</th>
                            <th class="action-col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                        <tr>
                            <td class="sr-col">{{ ++$i }}</td>
                            <td>{{ $class->class_name }}</td>
                            <td>{{ $class->students_count }}</td>
                            <td>
                                @foreach ($class->subjects as $subject)
                                    <span class="badge badge-light-info fs-7">{{ $subject->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $class->teacher->user->name ?? '' }}</td>
                            <td class="action-col">
                                <div class="action-btn-group">
                                    <a href="{{ route('classes.edit',$class->id) }}" class="action-btn edit-btn">
                                        <i class="fi fi-rr-pencil icon"></i>
                                    </a>
                                    <form action="{{ route('classes.destroy',$class->id) }}" method="POST" class="delete-btn-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn">
                                            <i class="fi fi-rr-trash icon"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('class.assign.subject',$class->id) }}" class="action-btn assign-btn" title="Assign Subject"><i class="fi fi-rr-bars-sort icon"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        initializeDatatable('#classes-table');
    });
</script>
@endsection