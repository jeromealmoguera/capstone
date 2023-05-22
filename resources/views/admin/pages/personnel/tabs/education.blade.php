<div class="card-inner">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Education Background</h4>
                <div class="nk-block-des">
                    <p>You can add or edit a education background.</p>
                </div>
            </div>
            <div class="nk-block-head-content ms-auto">
                <button class="btn btn-primary btn-sm d-block d-md-inline-block" data-bs-toggle="modal"
                    data-bs-target="#AddEducation">
                    <span class="d-none d-md-inline-block">Add Education</span>
                    <span class="d-md-none"><em class="icon ni ni-plus"></em></span>
                </button>
            </div>
        </div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col tb-col-sm"><span class="sub-text">#</span></th>
                            <th class="nk-tb-col tb-col"><span class="sub-text">Acad Level</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">School Name</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Course</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Start Year</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">End Year</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Units</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Acad Honors</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-end">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personnel->educationBackgrounds as $education)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col tb-col-sm">
                                <span>{{ $education->id }}</span>
                            </td>
                            <td class="nk-tb-col tb-col">
                                <span>{{ $education->acad_level }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span>{{ $education->school_name }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $education->course }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ \Carbon\Carbon::parse($education->start_year)->format('Y') }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ \Carbon\Carbon::parse($education->end_year)->format('Y') }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $education->unit_earned }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $education->acad_honors }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                            data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                    <button type="button" class="btn d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#EditEducation{{ $education->id }}">
                                                        <em class="icon ni ni-edit text-warning"></em>
                                                        <span class="ml-2">Edit</span>
                                                    </button>
                                                </li>
                                                <li>
                                                    <form method="post" action="{{ route('delete.education', $education->id) }}">
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


                        <div class="modal fade" tabindex="-1" id="EditEducation{{ $education->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <em class="icon ni ni-cross text-danger"></em>
                                    </a>
                                    <div class="modal-header bg-primary bg-opacity-50">
                                        <h5 class="modal-title text-white">Edit Education</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('edit.education', $education->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label class="form-label" for="acad_level">Academic Level</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="acad_level" name="acad_level" required value="{{ $education->acad_level }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="school_name">School Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="school_name" name="school_name" required value="{{ $education->school_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="course">Course</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="course" name="course" required value="{{ $education->course }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="start_year">Start Year</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control date-picker" name="start_year" required value="{{ \Carbon\Carbon::parse($education->start_year)->format('m/d/Y') }}">
                                                </div>
                                                <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="end_year">End Year</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control date-picker" name="end_year" required value="{{ \Carbon\Carbon::parse($education->end_year)->format('m/d/Y') }}">
                                                </div>
                                                <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="unit_earned">Unit Earned</label>
                                                <input type="number" class="form-control" id="unit_earned" name="unit_earned" min="0" max="999" value="{{ $education->unit_earned }}">
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="grad_year">Graduation Year</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control date-picker" name="grad_year" required value="{{ \Carbon\Carbon::parse($education->grad_year)->format('m/d/Y') }}">
                                                </div>
                                                <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="business-address">Academic Honors</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="business-address" name="acad_honors" required value="{{ $education->acad_honors }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                            </div>
                                        </form>
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

<div class="modal fade" tabindex="-1" id="AddEducation">
    <div class="modal-dialog">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross text-danger"></em>
            </a>
            <div class="modal-header bg-primary bg-opacity-50">
                <h5 class="modal-title text-white">Add Education</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('add.education', $personnel->id) }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="full-name">Academic Level</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="full-name" name="acad_level" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="relationship">School Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="relationship" name="school_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="occupation">Course</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="course" name="course" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="start-year">Start Year</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control date-picker" name="start_year" required>
                        </div>
                        <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
                    </div>

                    <div class="form-group">
                        <label for="end-year">End Year</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control date-picker" name="end_year" required>
                        </div>
                        <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
                    </div>

                    <div class="form-group">
                        <label for="unit_earned">Unit Earned</label>
                        <input type="number" class="form-control" id="unit_earned" name="unit_earned" min="0" max="999">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="grad-year">Graduation Year</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control date-picker" name="grad_year" required>
                        </div>
                        <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="business-address">Academic Honors</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="business-address" name="acad_honors" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Save</button>
                    </div>
                </form>
            </div> <!-- /.modal-body -->
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div>
