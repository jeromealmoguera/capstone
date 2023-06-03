@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block">
                <div class="card card-bordered">
                    <div class="card-aside-wrap">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-between">
                                    <div class="nk-block-head d-flex">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Required Documents</h4>
                                            <div class="nk-block-des">
                                                <p>Below are the documents that is required to be submitted for compliance.</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
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
                                                                                <a href="{{ route('my-documents.preview', ['id' => $document->id]) }}" target="_blank">
                                                                                    <em class="icon ni ni-focus"></em><span>Preview</span></a></li>
                                                                                </a>
                                                                            </li>
                                                                            @can('download document')
                                                                            <li>
                                                                                <a href="{{ route('my-documents.download', ['id' => $document->id]) }}"><em class="icon ni ni-download"></em><span>Download</span></a>
                                                                            </li>
                                                                            @endcan

                                                                            @can('delete document')
                                                                            <li>
                                                                                <a href="#" class="btn" style="border: none; padding-left: 11px; background-color: transparent;"
                                                                                onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this document?')) { document.getElementById('delete-form-{{ $document->id }}').submit(); }">
                                                                                <em class="icon ni ni-trash"></em>
                                                                                <span>Delete</span>
                                                                                </a>

                                                                            <form id="delete-form-{{ $document->id }}" method="POST" action="{{ route('my-documents.delete', ['id' => $document->id]) }}" style="display: none;">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                            </form>
                                                                            </li>
                                                                            @endcan

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
                            </div><!-- .nk-block -->
                        </div>
                        <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="card-inner-group" data-simplebar>
                                <div class="card-inner">
                                    <div class="user-card">
                                        <div class="user-avatar md{{ 'bg-' . collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random() }} d-none d-sm-flex">
                                            <span>{{ strtoupper(substr(Auth::user()->personnel->first_name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->personnel->last_name, 0, 1)) }}</span>

                                        </div>
                                        <div class="user-info">
                                            <h5>{{ Auth::user()->name }}</h5>
                                            <h6 class="fw-normal text-gray">{{ Auth::user()->email }}</h6>
                                        </div>

                                    </div><!-- .user-card -->
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <h5 class="overline-title-alt mb-2"><strong>Police Details</strong></h5>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <span class="sub-text">Account ID:</span>
                                            <span>{{ Auth::user()->personnel->id }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Station</span>
                                            <span>{{ Auth::user()->personnel->station }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Sub-Unit</span>
                                            <span>{{ Auth::user()->personnel->sub_unit }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Unit</span>
                                            <span>{{ Auth::user()->personnel->unit }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Designation</span>
                                            <span>{{ Auth::user()->personnel->designation }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Work Status</span>
                                            <span class="lead-text text-success">{{ Auth::user()->personnel->status }} / On Duty</span>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner p-0">
                                    <ul class="link-list-menu">
                                        <li><a class="active"  href="{{ route('view.my-document') }}"><em class="icon ni ni-files-fill"></em><span>Required Documents</span></a></li>
                                    </ul>
                                </div><!-- .card-inner -->
                            </div><!-- .card-inner-group -->
                        </div><!-- card-aside -->
                    </div><!-- .card-aside-wrap -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
@endsection

