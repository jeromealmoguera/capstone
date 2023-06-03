<div class="card-inner">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Work Experience</h4>
                <div class="nk-block-des">
                    <p>You can add or edit a work experience.</p>
                </div>
            </div>
            <div class="nk-block-head-content ms-auto">
                <button class="btn btn-primary btn-sm d-block d-md-inline-block" data-bs-toggle="modal"
                    data-bs-target="#AddExperience">
                    <span class="d-none d-md-inline-block">Add Work Exp</span>
                    <span class="d-md-none"><em class="icon ni ni-plus"></em></span>
                </button>
            </div>
        </div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
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
                        @foreach ($personnel->workExperiences as $experience)
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
                                                    <form method="post" action="{{ route('delete.work-experience', $experience->id) }}">
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
                                        <form action="{{ route('edit.work-experience', $experience->id) }}" method="POST">
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
    </div>
</div>

<!-- Add Experience Modal -->
<div class="modal fade" tabindex="-1" id="AddExperience">
    <div class="modal-dialog">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross text-danger"></em>
            </a>
            <div class="modal-header bg-primary bg-opacity-50">
                <h5 class="modal-title text-white">Add Work Experience</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.work-experience', $personnel->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Inclusive Dates</label>
                        <div class="form-control-wrap">
                            <div class="input-daterange date-picker-range input-group">
                                <input type="text" class="form-control" name="start_date" data-date-format="yyyy-mm-dd" required>
                                <div class="input-group-addon">TO</div>
                                <input type="text" class="form-control" name="end_date" data-date-format="yyyy-mm-dd" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="position">Position</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="position" name="position" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="department">Department</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="department" name="department" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="salary">Monthly Salary</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="salary" name="salary">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="pay_grade">Salary / Pay Grade</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="pay_grade" name="pay_grade">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="appointment_status">Appointment Status</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="appointment_status" name="appointment_status">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="gov_service">Government Service</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="gov_service" name="gov_service">
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

{{-- End --}}
