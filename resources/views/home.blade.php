@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')

<div class="home">
    @role('Admin')
        @include('dashboard.admin')
    @endrole

    @role('Parent')
        @include('dashboard.parents')
    @endrole

    @role('Teacher')
        @include('dashboard.teacher')
    @endrole

    @role('Student')
        @include('dashboard.student')
    @endrole

</div>

@endsection
