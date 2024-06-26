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
            <span class="card-label fw-bolder fs-2">Teachers<span class="text-gray-900 fs-5">({{ sprintf(count($teachers)) }})</span></span>
            <a href="{{ route('teacher.create') }}" class="btn btn-primary btn-sm listing-add-btn">
                <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"> <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" /> <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" /> </svg></span>
                Add Teacher
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered datatable-new" id="teachers-table">
                    <thead>
                        <tr>
                            <th class="sr-col">Sr. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject Name</th>
                            <th>Phone</th>
                            <th class="action-col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                        <tr>
                            <td class="sr-col">{{ ++$i }}</td>
                            <td>{{ $teacher->user->name }}</td>
                            <td>{{ $teacher->user->email }}</td>
                            <td>
                                @foreach ($teacher->subjects as $subject)
                                    <span class="badge badge-primary">{{ $subject->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $teacher->phone }}</td>
                            <td class="action-col">
                                <div class="action-btn-group">
                                    <a href="{{ route('teacher.edit',$teacher->id) }}" class="action-btn edit-btn">
                                        <i class="fi fi-rr-pencil icon"></i>
                                    </a>
                                    <a href="{{ route('teacher.destroy', $teacher->id) }}" data-url="{{ route('teacher.destroy', $teacher->id) }}" class="action-btn edit-btn deletebtn">
                                        <i class="fi fi-rr-trash icon"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('backend.modals.delete',['name' => 'teacher'])
</div>

@endsection

@push('scripts')
<script>
    $(function() {
        $( ".deletebtn" ).on( "click", function(event) {
            event.preventDefault();
            $( "#deletemodal" ).toggleClass( "hidden" );
            var url = $(this).attr('data-url');
            $(".remove-record").attr("action", url);
        })        
        
        $( "#deletemodelclose" ).on( "click", function(event) {
            event.preventDefault();
            $( "#deletemodal" ).toggleClass( "hidden" );
        })
    })

    $(document).ready(function() {
        initializeDatatable('#teachers-table');
    });
</script>
@endpush