@extends('admin.index')

@section('page')

<div class="container-fluid">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Document List</h4>
                <div class="nk-block-des">
                    <p>Total Documents <strong class="text-danger">{{ $documentCount }}.</strong></p>
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
                                <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="form-label">File Upload</label>
                                            <input type="file" class="form-control" id="file" name="file" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="form-label">Document Type</label>
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
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="form-label">Issued Date</label>
                                            <input type="date" class="form-control" id="issued_date" name="issued_date"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Owner</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2" name="personnel_id">
                                                <option value="placeholder">--Select Owner--</option>
                                                @foreach($personnel as $person)
                                                <option value="{{ $person->id }}">{{ $person->first_name }}
                                                    {{ $person->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Add Document</button>
                                        </div>
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
                        <tr class="nk-tb-item nk-tb-head">

                            <th class="nk-tb-col"><span class="sub-text">File Name</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Document Type</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Issued Year</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Owner</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Uploaded Date</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-end">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $document)
                        <tr class="nk-tb-item">
                            
                            <td class="nk-tb-col">
                                <span> <a href="{{ route('documents.download', $document->id) }}">{{ $document->file_name }}</a></span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span>{{ $document->document_type }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $document->issued_date->format('Y') }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <div class="user-card">
                                    <div
                                        class="user-avatar {{ 'bg-' . collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random() }} d-none d-sm-flex">
                                        <span>{{ strtoupper(substr($document->personnel->first_name, 0, 1)) }}{{ strtoupper(substr($document->personnel->last_name, 0, 1)) }}</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">{{ $document->personnel->first_name }}
                                            {{ $document->personnel->last_name }}<span
                                                class="dot dot-success d-md-none ms-1"></span></span>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $document->created_at }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                            data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                    <a href="{{ route('documents.preview', $document->id) }}" target="_blank">
                                                        <em class="icon ni ni-focus"></em><span>Preview</span></a></li>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('documents.download', $document->id) }}"><em class="icon ni ni-download"></em><span>Download</span></a>
                                                </li>
                                                <li>
                                                    <form method="POST" action="{{ route('documents.destroy', $document->id) }}" onsubmit="return confirm('Are you sure you want to delete this document?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn d-flex align-items-center" style="font-size: 12px;">
                                                            <em class="icon ni ni-trash text-danger"></em>
                                                            <span class="ml-2">Delete</span>
                                                        </button>
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
</div>
@endsection
