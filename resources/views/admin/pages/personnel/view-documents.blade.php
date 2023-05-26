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
                                    <li>Personnel ID: <span class="text-base">{{ $personnel->id }}</span></li>
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
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head d-flex">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Document List</h4>
                                                <div class="nk-block-des">
                                                    <p>The total documents of  <span class="fw-bold">{{ $personnel->first_name }}</span> is <strong class="text-danger">{{ $totalDocuments }}</strong></p>
                                                </div>
                                            </div>
                                            <div class="nk-block-head-content ms-auto">
                                                <button class="btn btn-primary btn-sm d-block d-md-inline-block" data-bs-toggle="modal"
                                                    data-bs-target="#Upload">
                                                    <span class="d-none d-md-inline-block">Upload</span>
                                                    <span class="d-md-none"><em class="icon ni ni-plus"></em></span>
                                                </button>

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
                                                                <form method="POST" action="{{ route('documents.store', ['personnelId' => $personnel->id]) }}" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <input type="hidden" name="personnel_id" value="{{ $personnel->id }}">

                                                                    <div class="form-group">
                                                                        <label class="form-label">File Upload </label>
                                                                        <input type="file" class="form-control" name="file" required>
                                                                        <code>pdf,jpeg,jpg,png|max:2048 </code>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label">Document Type</label>
                                                                        <select class="form-select" name="document_type" required>
                                                                            <option>-- Select Document Type --</option>
                                                                            <option value="Personal Data Sheet">Personal Data Sheet</option>
                                                                            <option value="Diploma/TOR">Diploma/TOR</option>
                                                                            <option value="Physical Fitness Test">Physical Fitness Test</option>
                                                                            <option value="Trainings">Trainings</option>
                                                                            <option value="Specialized Trainings">Specialized Trainings</option>
                                                                            <option value="SALN">SALN</option>
                                                                            <option value="KSS">KSS</option>
                                                                            <option value="PER">PER</option>
                                                                            <option value="Reassignments">Reassignments</option>
                                                                            <option value="Eligibility">Eligibility</option>
                                                                            <!-- Add more options as needed -->
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label">Issued Date</label>
                                                                        <input type="date" class="form-control" name="issued_date" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-primary">Add Document</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                    <thead>
                                                        @if(session('success'))
                                                            <div class="alert alert-success">
                                                                {{ session('success') }}
                                                            </div>
                                                        @endif
                                                        <tr class="nk-tb-item nk-tb-head">

                                                            <th class="nk-tb-col"><span class="sub-text">File Name</span></th>
                                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Document Type</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Issued Year</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Uploaded Date</span></th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($documents as $document)
                                                            <tr class="nk-tb-item">

                                                                <td class="nk-tb-col">
                                                                    <span><a href="{{ route('documents.download', ['id' => $document->id]) }}">{{ $document->file_name }}</a></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-mb">
                                                                    <span>{{ $document->document_type }}</span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span>{{ $document->issued_date->format('Y') }}</span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span>{{ $document->created_at->format('M d, Y') }}</span>
                                                                </td>
                                                                <td class="nk-tb-col nk-tb-col-tools">
                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li>
                                                                                        <a href="{{ route('documents.preview', ['id' => $document->id]) }}" target="_blank">
                                                                                            <em class="icon ni ni-focus"></em><span>Preview</span></a></li>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="{{ route('documents.download', ['id' => $document->id]) }}"><em class="icon ni ni-download"></em><span>Download</span></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#" class="btn" style="border: none; padding-left: 11px; background-color: transparent;"
                                                                                        onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this document?')) { document.getElementById('delete-form-{{ $document->id }}').submit(); }">
                                                                                         <em class="icon ni ni-trash"></em>
                                                                                         <span>Delete</span>
                                                                                        </a>

                                                                                     <form id="delete-form-{{ $document->id }}" method="POST" action="{{ route('documents.delete', ['id' => $document->id]) }}" style="display: none;">
                                                                                         @csrf
                                                                                         @method('DELETE')
                                                                                     </form>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    </ul>
                                                                </td>
                                                            </tr><!-- .nk-tb-item  -->
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- .card-preview -->
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
