@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Personnel / <strong class="text-primary small">{{ $personnel->first_name }} {{ $personnel->last_name }}</strong></h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    <li>Personnel Account ID: <span class="text-base">{{ $personnel->id }}</span></li>
                                    <li>Last Login: <span class="text-base">{{ $personnel->created_at }}</span></li>
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
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('view.personnel.profile', ['id' => $personnel->id]) }}"><em class="icon ni ni-user-circle"></em><span>Overview</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('view.personnel.documents', ['id' => $personnel->id]) }}"><em class="icon ni ni-file-text"></em><span>Documents</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('change-password', ['id' => $personnel->id]) }}"><em class="icon ni ni-shield-star"></em><span>Change Password</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('view.personnel.account-setting') }}"><em class="icon ni ni-setting-fill"></em><span>Account Setting</span></a>
                                    </li>
                                    {{-- <li class="nav-item nav-item-trigger d-xxl-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
                                    </li> --}}
                                </ul><!-- .nav-tabs -->
                                <div class="card-inner">
                                    <div class="nk-block">
                                        <div class="row g-gs">
                                            <div class="col-lg-4 col-xl-4 col-xxl-3">
                                                <div class="card">
                                                    <div class="card-inner-group">
                                                        <div class="card-inner">
                                                            <div class="user-card user-card-s2">
                                                                <div class="text-center">
                                                                    <div class="user-avatar lg text-center {{ 'bg-' . collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random() }} d-none d-sm-flex">
                                                                        <span>{{ strtoupper(substr($personnel->first_name, 0, 1)) }}{{ strtoupper(substr($personnel->last_name, 0, 1)) }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="user-info">
                                                                    <div class="badge bg-light rounded-pill ucap">{{ $personnel->ranks }}</div>
                                                                    <h5>{{ $personnel->first_name }}{{ $personnel->last_name }}</h5>
                                                                    <span class="sub-text">{{ $personnel->user->email }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-inner card-inner-sm">
                                                            <ul class="btn-toolbar justify-center gx-1">
                                                                <li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-mail"></em></a></li>
                                                                <li><a href="#" class="btn btn-trigger btn-icon text-danger"><em class="icon ni ni-na"></em></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-inner">
                                                            <div class="row text-center">
                                                                <div class="col-6">
                                                                    <div class="profile-stats">
                                                                        <span class="amount">{{ $totalDocuments }}</span>
                                                                        <span class="sub-text">Total Documents</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="profile-stats">
                                                                        <span class="amount">{{ $totalLatestDocuments }}</span>
                                                                        <span class="sub-text">Requirements</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-inner -->
                                                        <div class="card-inner">
                                                            <h6 class="overline-title-alt mb-2">Police Details</h6>
                                                            <div class="row g-3">
                                                                <div class="col-6">
                                                                    <span class="sub-text">Personnel Account ID:</span>
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
                                                    </div>
                                                </div>
                                            </div><!-- .col -->
                                            <div class="col-lg-8 col-xl-8 col-xxl-9">
                                                <div class="card">
                                                    <div class="card-inner">
                                                        <div class="nk-block">
                                                            <div class="nk-block-between g-3">
                                                                <div class="nk-block-head-content">
                                                                    <h5 class="nk-block-title">Basic Information <strong class="text-primary light"></strong></h5>
                                                                    <p>Here are the overview information of the user.</p>
                                                                    <div class="nk-block-des text-soft">
                                                                        <ul class="list-inline">
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="nk-block-head-content mb-3">
                                                                   <a href="{{ route('view.profile', $personnel->id) }}">Click for full details</a>
                                                                </div>
                                                            </div>

                                                            <div class="row g-4">
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
                                                                            <span class="profile-ud-label">Height (cm)</span>
                                                                            <span class="profile-ud-value">{{ $personnel->height }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Weight</span>
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
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="nk-divider divider md"></div>

                                                        <div class="nk-block">
                                                            <div class="nk-block-between g-3">
                                                                <div class="nk-block-head-content">
                                                                    <h5 class="nk-block-title">Requirements <strong class="text-primary light"></strong></h5>
                                                                    <p>List of requirements to be submitted for compliance.</p>
                                                                    <div class="nk-block-des text-soft">
                                                                        <ul class="list-inline">
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="nk-block-head-content">
                                                                    <a href="#Upload" data-bs-toggle="modal" class="btn bg-primary d-sm-inline-flex text-white"><em class="icon ni ni-plus-sm"></em><span>Upload</span></a>
                                                                    {{-- modal --}}
                                                                    <div class="modal fade" tabindex="-1" id="Upload">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                    <em class="icon ni ni-cross"></em>
                                                                                </a>
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Add Document</h5>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="{{ route('upload.document', $personnel->id) }}" method="POST" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <label for="document_file" class="form-label mb-2">Document File</label>
                                                                                        <input type="file" class="form-control" name="document_file">
                                                                                        <label class="form-label mt-2 mb-3">Document Type</label>
                                                                                        <select class="form-select js-select2" name="document_type">
                                                                                            <option value="placeholder">--Select Document Type--</option>
                                                                                            <option value="PDS">Personal Data Sheet</option>
                                                                                            <option value="Diploma">Diploma/TOR</option>
                                                                                            <option value="PFT">Physical Fitness Test</option>
                                                                                            <option value="Trainings">Trainings</option>
                                                                                            <option value="ST">Specialized Trainings</option>
                                                                                            <option value="Reassignments">SALN</option>
                                                                                            <option value="Eligibility">KSS</option>
                                                                                            <option value="SALN">PER</option>
                                                                                            <option value="KSS">Reassignments</option>
                                                                                            <option value="PER">Eligibility</option>
                                                                                        </select>

                                                                                        <button type="submit" class="btn btn-primary mt-2">Upload</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row g-3">

                                                                @foreach($latestIssuedDocuments as $document)
                                                                    <div class="col-xl-12 col-xxl-6">
                                                                        <div class="card">
                                                                            <div class="card-inner">
                                                                                <div class="d-flex align-items-center justify-content-between">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <div class="icon-circle icon-circle-lg">
                                                                                            <em class="icon ni ni-file-img"></em>
                                                                                        </div>
                                                                                        <div class="ms-3">
                                                                                            <h6 class="lead-text">{{ $document->document_type }}</h6>
                                                                                            <span class="sub-text">{{ $document->file_name }} ({{ $document->issued_date->format('Y') }}) </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <ul class="btn-toolbar justify-center gx-1 me-n1 flex-nowrap">
                                                                                        <li>
                                                                                            <a href="{{ route('documents.preview', ['id' => $document->id]) }}" target="_blank" class="btn btn-trigger btn-icon">
                                                                                                <em class="icon ni ni-eye"></em>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="{{ route('documents.download', ['id' => $document->id]) }}" class="btn btn-trigger btn-icon">
                                                                                                <em class="icon ni ni-download"></em>
                                                                                            </a>
                                                                                        </li>
                                                                                        <form method="POST" action="{{ route('documents.delete', ['id' => $document->id]) }}" onsubmit="return confirm('Are you sure you want to delete this document?');">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button type="submit" class="btn btn-trigger btn-icon">
                                                                                                <em class="icon ni ni-trash"></em>
                                                                                            </button>
                                                                                        </form>

                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- .col -->
                                                                @endforeach
                                                            </div><!-- .row -->
                                                        </div>

                                                    </div><!-- .card-inner -->
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                        </div><!-- .row -->
                                    </div>
                                </div><!-- .card-inner -->
                            </div><!-- .card-content -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
@endsection
