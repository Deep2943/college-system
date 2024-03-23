@extends('layouts.app')
@section('pageTitle', $pageTitle)
@section('content')
    <div class="profile">
        <div class="card">
            <div class="card-body pt-5 pb-0">
                <div class="d-flex mb-5 justify-content-between">
                    <span class="card-label fw-bolder fs-2">Profile</span>
                    <div>
                        <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary me-2">Edit Profile</a>
                        <a href="{{ route('profile.change.password') }}" class="btn btn-sm btn-danger me-2">Change Password</a>
                    </div>
                </div>
                <div class="pdf-content pb-5">
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3 align-items-center">
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="{{ asset('images/profile/' . auth()->user()->profile_picture) }}" alt="image" class="object-contain">
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="text-gray-900 fs-2 fw-bolder me-1">{{ auth()->user()->name }}</div>
                                        <div class="btn btn-sm btn-light-primary fw-bolder ms-2 fs-7 py-1 px-3">{{ auth()->user()->roles[0]->name ?? '' }}</div>
                                    </div>
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-md-4 pe-2 flex-column flex-md-row">
                                        <a href="mailto:{{ auth()->user()->email }}" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                                <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                            </svg>
                                        </span>{{ auth()->user()->email }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection