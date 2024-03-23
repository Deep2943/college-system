@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.min.js">
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="main-listing-page">
    <div class="card">
        <div class="card-header listing-header pt-5 border-0">
            <span class="card-label fw-bolder fs-2">{{ $pageTitle }}<span class="text-gray-900 fs-5">({{ sprintf(count($users)) }})</span></span>
            <a href="{{ route('assignrole.create') }}" class="btn btn-primary btn-sm listing-add-btn">
                <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"> <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" /> <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" /> </svg></span>
                Add User
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered datatable-new" id="assign-role-table">
                    <thead>
                        <tr>
                            <th class="sr-col">Sr. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="action-col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="sr-col">{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge badge-light-info fs-7">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td class="action-col">
                                <div class="action-btn-group">
                                    <a href="{{ route('assignrole.edit',$user->id) }}" class="action-btn edit-btn">
                                        <i class="fi fi-rr-pencil icon"></i>
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
</div>

<script>
    $(document).ready(function() {
        let table = new DataTable('#assign-role-table', {
            bProcessing: true,
            iDisplayLength: 10,
            bDestroy: true,
            fixedHeader: {
                header: true,
            },
            sScrollY: "calc(100vh - 310px)",
            sScrollX: "100%",
            dom: 'frt<"bottom-content" i<"bottom"lp><"clear">>',
            ordering: false
        });
    } );
</script>
@endsection