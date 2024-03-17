@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')
<div class="add-page">
    <div class="card">
        <div class="card-header listing-header pt-5 border-0">
            <span class="card-label fw-bolder fs-2">{{ $pageTitle }}</span>
        </div>
        <div class="card-body">
            <form action="{{ route('store.class.assign.subject',$classid) }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="fw-bold fs-6 mb-2">Subjects</label>
                            <div class="checkbox-list">
                                @foreach ($subjects as $subject)
                                    <div class="pb-4 custom-checkbox border-bottom pt-4">
                                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                            <span class="form-check-label text-gray-700 fs-6 fw-bold ms-0 me-2">{{ $subject->name }}</span>
                                            <input class="form-check-input" name="selectedsubjects[]" type="checkbox" value="{{ $subject->id }}"
                                                @foreach ($assigned->subjects as $item)
                                                    {{ ($item->id === $subject->id) ? 'checked' : '' }}
                                                @endforeach />
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="fw-bold fs-6 mb-2">Students</label>
                        <div class="table-responsive">
                            <table class="table table-bordered border-bottom datatable-new">
                                <thead>
                                    <tr>
                                        <th class="sr-col">Sr. No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Parent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($assigned->students) > 0)
                                        @foreach ($assigned->students as $student)
                                        <tr>
                                            <td class="sr-col">{{ ++$i }}</td>
                                            <td>{{ $student->user->name }}</td>
                                            <td>{{ $student->user->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>{{ $student->parent->user->name }}</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr><td colspan="5" class="no-record">No Record Found</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="buttons-div">
                            <button type="submit" title="Assign Subject" class="btn btn-primary">Assign Subject</button>
                            <a href="{{ route('classes.index') }}" title="Back" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </form>  
        </div>
    </div>
</div>
@endsection