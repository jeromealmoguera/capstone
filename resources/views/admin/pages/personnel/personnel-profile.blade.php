@extends('admin.index')
@section('page')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
           <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Personnel / <strong class="text-primary light">{{ $personnel->first_name }} {{ $personnel->last_name }}</strong></h3>
                        <div class="nk-block-des text-soft">
                            <ul class="list-inline">
                                <li>Personnel ID: {{ $personnel->id }}<span class="text-base"></span></li>
                                {{-- <li>Last Login: <span class="text-base"></span></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="nk-block-head-content">
                        <a href="{{ route('personnel-list') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                        <a href="{{ route('personnel-list') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card">
                    <div class="card-aside-wrap">
                        <div class="card-content">
                            <!-- .nav-tabs -->
                            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personal">
                                        <em class="icon ni ni-user-circle"></em><span>Personal</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#family">
                                        <em class="icon ni ni-home-alt"></em><span>Family</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#education">
                                        <em class="icon ni ni-reports-alt"></em><span>Education</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#eligibility">
                                        <em class="icon ni ni-note-add"></em><span>Eligibility</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#experience">
                                        <em class="icon ni ni-report-profit"></em><span>Experience</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#volunteer">
                                        <em class="icon ni ni-task"></em><span>Volunteer</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#trainings">
                                        <em class="icon ni ni-award"></em></em><span>Trainings</span>
                                    </a>
                                </li>
                                <li class="nav-item nav-item-trigger d-xxl-none">

                                    <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
                                </li>
                            </ul>
                            <div class="tab-content mt-0">
                                <div class="tab-pane active flex-fill" id="personal">
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            @if(session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            <div class="nk-block-head d-flex">
                                                <div class="nk-block-head-content">
                                                    <h5 class="title">Personal Information</h5>
                                                    <p>Basic info, like your name and address.</p>
                                                </div>
                                                <div class="nk-block-head-content ms-auto">
                                                    <a href="{{ route('edit.personnel', $personnel->id) }}">
                                                        <button class="btn btn-primary btn-sm d-block d-md-inline-block">
                                                            <em class="icon ni ni-edit"></em>
                                                            <span class="d-none d-md-inline-block">Edit</span>
                                                            <span class="d-md-none"><em class="icon ni ni-plus"></em></span>
                                                        </button>
                                                    </a>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">First Name</span>
                                                        <span class="profile-ud-value">{{ $personnel->first_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Middle Name</span>
                                                        <span class="profile-ud-value">{{ $personnel->middle_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Last Name</span>
                                                        <span class="profile-ud-value">{{ $personnel->last_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Date of Birth</span>
                                                        <span class="profile-ud-value">{{ $personnel->birth_date }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Birth Place</span>
                                                        <span class="profile-ud-value">{{ $personnel->birth_place }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Gender</span>
                                                        <span class="profile-ud-value">{{ $personnel->gender }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Civil Status</span>
                                                        <span class="profile-ud-value">{{ $personnel->civil_status }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Citizenship</span>
                                                        <span class="profile-ud-value">{{ $personnel->citizenship }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Blood Type</span>
                                                        <span class="profile-ud-value">{{ $personnel->blood_type }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Height</span>
                                                        <span class="profile-ud-value">{{ $personnel->height }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">weight</span>
                                                        <span class="profile-ud-value">{{ $personnel->weight }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Mobile No.</span>
                                                        <span class="profile-ud-value">{{ $personnel->mobile_no }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Telephone No.</span>
                                                        <span class="profile-ud-value">{{ $personnel->tel_no }}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                        <div class="nk-divider divider md"></div>
                                        <!-- .nk-block -->
                                        <div class="nk-block">
                                            <div class="nk-block-head nk-block-head-line">
                                                <h6 class="title overline-title text-base">Current Address</h6>
                                            </div><!-- .nk-block-head -->

                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Street/ House # / Bldg. </span>
                                                        <span class="profile-ud-value">{{ $personnel->home_street }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">City / Municipality</span>
                                                        <span class="profile-ud-value">{{ $personnel->home_city }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Province</span>
                                                        <span class="profile-ud-value">{{ $personnel->home_province }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Zip Code</span>
                                                        <span class="profile-ud-value">{{ $personnel->home_zip }}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                        <div class="nk-block">
                                            <div class="nk-block-head nk-block-head-line">
                                                <h6 class="title overline-title text-base">Permanent Address</h6>
                                            </div><!-- .nk-block-head -->

                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Street/ House # / Bldg. </span>
                                                        <span class="profile-ud-value">{{ $personnel->current_street }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">City / Municipality</span>
                                                        <span class="profile-ud-value">{{ $personnel->current_city }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Province</span>
                                                        <span class="profile-ud-value">{{ $personnel->current_province }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Zip Code</span>
                                                        <span class="profile-ud-value">{{ $personnel->current_zip }}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div>
                                </div>
                                <div class="tab-pane flex-fill" id="family">
                                    @include('admin.pages.personnel.tabs.family')
                                </div>
                                <div class="tab-pane flex-fill" id="education">
                                    @include('admin.pages.personnel.tabs.education')
                                </div>
                                <div class="tab-pane flex-fill" id="eligibility">
                                    @include('admin.pages.personnel.tabs.eligibility')
                                </div>
                                <div class="tab-pane flex-fill" id="experience">
                                    @include('admin.pages.personnel.tabs.work-experience')
                                </div>
                                <div class="tab-pane flex-fill" id="volunteer">
                                    @include('admin.pages.personnel.tabs.voluntary-work')
                                </div>
                                <div class="tab-pane flex-fill" id="trainings">
                                    @include('admin.pages.personnel.tabs.trainings')
                                </div>
                            </div>
                        </div><!-- .card-content -->
                        <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl" data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true" data-toggle-body="true">
                            <div class="card-inner-group" data-simplebar>
                                <div class="card-inner">
                                    <div class="user-card user-card-s2">
                                        <div class="text-center">
                                            <div class="user-avatar lg text-center {{ 'bg-' . collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random() }} d-none d-sm-flex">
                                                <span>{{ strtoupper(substr($personnel->first_name, 0, 1)) }}{{ strtoupper(substr($personnel->last_name, 0, 1)) }}</span>
                                            </div>
                                        </div>
                                        <div class="user-info">
                                            <div class="badge bg-outline-light rounded-pill ucap">{{ $personnel->ranks }}</div>
                                            <h5>{{ $personnel->first_name }} {{ $personnel->last_name }}</h5>
                                            <span class="sub-text">{{ $personnel->user->email }}</span>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->

                                <div class="card-inner">
                                    <h6 class="overline-title-alt mb-2">Police Details</h6>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <span class="sub-text">Account ID:</span>
                                            <span>{{ $personnel->id }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Station</span>
                                            <span>{{ $personnel->station }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Sub-Unit</span>
                                            <span>{{ $personnel->sub_unit }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Unit</span>
                                            <span>{{ $personnel->unit }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Designation</span>
                                            <span>{{ $personnel->designation }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Work Status</span>
                                            <span class="lead-text text-success">{{ $personnel->status }}</span>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                            </div><!-- .card-inner -->
                        </div><!-- .card-aside -->
                    </div><!-- .card-aside-wrap -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
@endsection
