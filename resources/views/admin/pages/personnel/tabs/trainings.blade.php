<div class="card-inner">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Trainings</h4>
                <div class="nk-block-des">
                    <p>You can add or edit trainings.</p>
                </div>
            </div>
            <div class="nk-block-head-content ms-auto">
                <button class="btn btn-primary btn-sm d-block d-md-inline-block" data-bs-toggle="modal"
                    data-bs-target="#AddTraining">
                    <span class="d-none d-md-inline-block">Add Training</span>
                    <span class="d-md-none"><em class="icon ni ni-plus"></em></span>
                </button>
            </div>
        </div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">

                            <th class="nk-tb-col tb-col"><span class="sub-text">Title</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Start Date</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">End Date</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Hours No.</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">LD Type</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Sponsor</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-end">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personnel->trainings as $training)
                        <tr class="nk-tb-item">

                            <td class="nk-tb-col tb-col">
                                <span>{{ $training->title }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ \Carbon\Carbon::parse($training->start_date)->format('M d, Y') }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ \Carbon\Carbon::parse($training->end_date)->format('M j, Y') }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span>{{ $training->hours_no }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $training->ld_type }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $training->sponsor }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                            data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                    <button type="button" class="btn d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#EditTraining{{ $training->id }}">
                                                        <em class="icon ni ni-edit text-warning"></em>
                                                        <span class="ml-2">Edit</span>
                                                    </button>
                                                </li>
                                                <li>
                                                    <form method="post" action="{{ route('delete.training', $training->id) }}">
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
                        <!-- Edit Trainings Modal -->
                        <div class="modal fade" tabindex="-1" id="EditTraining{{ $training->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <em class="icon ni ni-cross text-danger"></em>
                                    </a>
                                    <div class="modal-header bg-primary bg-opacity-50">
                                        <h5 class="modal-title text-white">Edit Trainings</h5>
                                    </div>
                                    <div class="modal-body">
                                        <<form action="{{ route('edit.training', $training->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label class="form-label" for="title">Title</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="title" name="title" value="{{ $training->title }}" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Inclusive Dates</label>
                                                <div class="form-control-wrap">
                                                    <div class="input-daterange date-picker-range input-group">
                                                        <input type="text" class="form-control" name="start_date" value="{{ \Carbon\Carbon::parse($training->start_date)->format('m/d/Y') }}" data-date-format="yyyy" />
                                                        <div class="input-group-addon">TO</div>
                                                        <input type="text" class="form-control" name="end_date" value="{{ \Carbon\Carbon::parse($training->end_date)->format('m/d/Y') }}" data-date-format="yyyy" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="hours_no">Number of Hours</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="hours_no" name="hours_no" value="{{ $training->hours_no }}" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="ld_type">Type of LD</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="ld_type" name="ld_type" value="{{ $training->ld_type }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="sponsor">Conducted / Sponsored By</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="sponsor" name="sponsor" value="{{ $training->sponsor }}">
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

<!-- Add Trainings Modal -->
<div class="modal fade" tabindex="-1" id="AddTraining">
    <div class="modal-dialog">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross text-danger"></em>
            </a>
            <div class="modal-header bg-primary bg-opacity-50">
                <h5 class="modal-title text-white">Add Trainings</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.training', $personnel->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="title">Title</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="title" name="title" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Inclusive Dates</label>
                        <div class="form-control-wrap">
                            <div class="input-daterange date-picker-range input-group">
                                <input type="text" class="form-control" name="start_date" data-date-format="yyyy" />
                                <div class="input-group-addon">TO</div>
                                <input type="text" class="form-control" name="end_date" data-date-format="yyyy" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="hours_no">Number of Hours</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="hours" name="hours_no" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="ld_type">Type of LD</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="ld_type" name="ld_type">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="sponsor">Conducted / Sponsored By</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="sponsored_by" name="sponsor">
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
