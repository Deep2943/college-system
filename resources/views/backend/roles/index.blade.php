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
            <span class="card-label fw-bolder fs-2">{{ $pageTitle }}<span class="text-gray-900 fs-5">({{ sprintf(count($roles)) }})</span></span>
            <div class="d-flex gap-2">
                <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm listing-add-btn">
                    <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"> <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" /> <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" /> </svg></span>
                    Add Role
                </a>
                <a href="{{ route('permission.create') }}" class="btn btn-primary btn-sm listing-add-btn">
                    <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"> <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" /> <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" /> </svg></span>
                    Add Permission
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered datatable-new" id="role-permission-table">
                    <thead>
                        <tr>
                            <th class="sr-col">Sr. No.</th>
                            <th>Role</th>
                            <th>Permissions</th>
                            <th class="action-col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td class="sr-col">{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions as $permission)
                                    <span class="badge badge-light-info fs-7">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td class="action-col">
                                <div class="action-btn-group">
                                    <a href="{{ route('role.edit',$role->id) }}" class="action-btn edit-btn">
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
        initializeDatatable('#role-permission-table');
    });
</script>
@endsection