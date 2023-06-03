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
                                            <h4 class="nk-block-title">Work Experience</h4>
                                            <div class="nk-block-des">
                                                <p>You can check here all your work experiences.</p>
                                            </div>
                                            {{-- <button class="btn btn-primary btn-sm d-block d-md-inline-block" data-bs-toggle="modal"
                                            data-bs-target="#AddEducation">
                                                <span class="d-none d-md-inline-block">Add Education</span>
                                                <span class="d-md-none"><em class="icon ni ni-plus"></em></span>
                                            </button> --}}
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
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                            <thead>
                                                <tr class="nk-tb-item nk-tb-head">

                                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Start Date</span></th>
                                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">End Date</span></th>
                                                    <th class="nk-tb-col tb-col"><span class="sub-text">Position</span></th>
                                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Department</span></th>
                                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Monthly Salary</span></th>
                                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Salary / Pay Grade</span></th>
                                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Appointment Status</span></th>
                                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">gov_service</span></th>
                                                    <th class="nk-tb-col nk-tb-col-tools text-end">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($workExperience as $experience)
                                                <tr class="nk-tb-item">

                                                    <td class="nk-tb-col tb-col-md">
                                                        <span>{{ \Carbon\Carbon::parse($experience->start_date)->format('F j, Y') }}</span>
                                                    </td>
                                                    <td class="nk-tb-col tb-col-md">
                                                        <span>{{ \Carbon\Carbon::parse($experience->end_date)->format('F j, Y') }}</span>
                                                    </td>
                                                    <td class="nk-tb-col tb-col">
                                                        <span>{{ $experience->position }}</span>
                                                    </td>
                                                    <td class="nk-tb-col tb-col-mb">
                                                        <span>{{ $experience->department }}</span>
                                                    </td>
                                                    <td class="nk-tb-col tb-col-md">
                                                        <span>{{ $experience->salary }}</span>
                                                    </td>
                                                    <td class="nk-tb-col tb-col-md">
                                                        <span>{{ $experience->pay_grade }}</span>
                                                    </td>
                                                    <td class="nk-tb-col tb-col-md">
                                                        <span>{{ $experience->appointment_status }}</span>
                                                    </td>
                                                    <td class="nk-tb-col tb-col-md">
                                                        <span>{{ $experience->gov_service }}</span>
                                                    </td>
                                                    <td class="nk-tb-col nk-tb-col-tools">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                                    data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li>
                                                                            <button type="button" class="btn d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#EditExperience{{ $experience->id }}">
                                                                                <em class="icon ni ni-edit text-warning"></em>
                                                                                <span class="ml-2">Edit</span>
                                                                            </button>
                                                                        </li>
                                                                        <li>
                                                                            <form method="post" action="{{ route('delete.my-experience', $experience->id) }}">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn d-flex align-items-center">
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
                                                <!-- Edit Experience Modal -->
                                                <div class="modal fade" tabindex="-1" id="EditExperience{{ $experience->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <em class="icon ni ni-cross text-danger"></em>
                                                            </a>
                                                            <div class="modal-header bg-primary bg-opacity-50">
                                                                <h5 class="modal-title text-white">Edit Work Experience</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('edit.my-experience', $experience->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="id" value="{{ $experience->id }}">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Inclusive Dates</label>
                                                                        <div class="form-control-wrap">
                                                                            <div class="input-daterange date-picker-range input-group">
                                                                                <input type="text" class="form-control" name="start_date" data-date-format="yyyy-mm-dd" value="{{ \Carbon\Carbon::parse($experience->start_date)->format('m/d/Y') }}" required>
                                                                                <div class="input-group-addon">TO</div>
                                                                                <input type="text" class="form-control" name="end_date" data-date-format="yyyy-mm-dd" value="{{ \Carbon\Carbon::parse($experience->end_date)->format('m/d/Y') }}" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="position">Position</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" id="position" name="position" value="{{ $experience->position }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="department">Department</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" id="department" name="department" value="{{ $experience->department }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="salary">Monthly Salary</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" id="salary" name="salary" value="{{ $experience->salary }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="pay_grade">Salary / Pay Grade</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" id="pay_grade" name="pay_grade" value="{{ $experience->pay_grade }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="appointment_status">Appointment Status</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" id="appointment_status" name="appointment_status" value="{{ $experience->appointment_status }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="gov_service">Government Service</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control" id="gov_service" name="gov_service" value="{{ $experience->gov_service }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                        <li><a  href="{{ route('view.my-info') }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                        <li><a  href="{{ route('view.my-family') }}"><em class="icon ni ni-home-alt"></em><span>Family Member</span>
                                        <li><a  href="{{ route('view.my-education') }}"><em class="icon ni ni-reports-alt"></em><span>Education Background</span>
                                        <li><a  href="{{ route('view.my-eligibility') }}"><em class="icon ni ni-note-add"></em><span>Eligibility</span>
                                        <li><a class="active" href="{{ route('view.my-experience') }}"><em class="icon ni ni-report-profit"></em><span>Work Experience</span>
                                        <li><a href="{{ route('view.my-volunteers') }}"><em class="icon ni ni-task"></em><span>Voluntary Works</span>
                                        <li><a href="{{ route('view.my-trainings') }}"><em class="icon ni ni-award"></em></em><span>Trainings</span>
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

