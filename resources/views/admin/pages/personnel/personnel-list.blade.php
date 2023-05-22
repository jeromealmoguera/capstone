@extends('admin.index')
@section('page')
<div class="container-fluid">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Personnel Lists</h4>
                <div class="nk-block-des">
                    <p>You have <strong class="text-danger">({{ $personnelCount }})</strong> in total.</p>
                </div>
            </div>

        </div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="uid">
                                    <label class="custom-control-label" for="uid"></label>
                                </div>
                            </th>
                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Rank</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Station</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-end">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personnels as $personnel)
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="{{ $personnel->id }}">
                                        <label class="custom-control-label" for="{{ $personnel->id }}"></label>
                                    </div>
                                </td>
                                <td class="nk-tb-col">
                                    <a href="{{ route('view.profile', $personnel->id) }}">
                                        <div class="user-card">
                                            <div class="user-avatar {{ 'bg-' . collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random() }} d-none d-sm-flex">
                                                <span>{{ strtoupper(substr($personnel->first_name, 0, 1)) }}{{ strtoupper(substr($personnel->last_name, 0, 1)) }}</span>
                                            </div>
                                            <div class="user-info">
                                                <span class="tb-lead">{{ $personnel->first_name }} {{ $personnel->last_name }}<span class="dot dot-success d-md-none ms-1"></span></span>
                                                {{-- <span>info@softnio.com</span> --}}
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td class="nk-tb-col tb-col-mb" id="user-rank">
                                    <span>{{ $personnel->ranks }}</span></span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    <span>{{ $personnel->station }}</span>
                                </td>
                                <td class="nk-tb-col tb-col-md">
                                    @if($personnel->status === 'Active')
                                        <span class="text-success">{{ ($personnel->status) }}</span>
                                    @elseif($personnel->status === 'Inactive')
                                        <span class="text-danger">{{ ($personnel->status) }}</span>
                                    @endif
                                </td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li class="nk-tb-action-hidden">
                                            <a href="{{ route('view.personnel.profile', ['id' => $personnel->id]) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details">
                                                <em class="icon ni ni-eye-fill"></em>
                                            </a>
                                        </li>
                                        <li class="nk-tb-action-hidden">
                                            <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Email">
                                                <em class="icon ni ni-mail-fill"></em>
                                            </a>
                                        </li>
                                        <li class="nk-tb-action-hidden">
                                            <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive">
                                                <em class="icon ni ni-archived-fill"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{ route('view.personnel.profile',['id' => $personnel->id]) }}"><em class="icon ni ni-eye"></em><span>Overview</span></a></li>
                                                        <li><a href="{{ route('edit.personnel', $personnel->id) }}"><em class="icon ni ni-edit"></em><span>Update Details</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-account-setting-alt"></em><span>Account Settings</span></a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="{{ route('view.personnel.documents', ['id' => $personnel->id]) }}"><em class="icon ni ni-folder-list"></em><span>Documents</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-mail"></em><span>Send Email</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-archived"></em><span>Move to Archive</span></a></li>
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
    </div> <!-- nk-block -->
</div>
@endsection
