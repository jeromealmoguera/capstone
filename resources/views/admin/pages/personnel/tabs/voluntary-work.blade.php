<div class="card-inner">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Voluntary Works</h4>
                <div class="nk-block-des">
                    <p>You can add or edit a voluntary works.</p>
                </div>
            </div>
            <div class="nk-block-head-content ms-auto">
                <button class="btn btn-primary btn-sm d-block d-md-inline-block" data-bs-toggle="modal"
                    data-bs-target="#AddVolunteer">
                    <span class="d-none d-md-inline-block">Add Volunteer Works</span>
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
                            <th class="nk-tb-col tb-col"><span class="sub-text">Organization</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Address</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Start Date</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">End Date</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Work Hours</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Position</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-end">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personnel->voluntaryWorks as $work)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col tb-col-sm">
                                <span>{{ $work->id }}</span>
                            </td>
                            <td class="nk-tb-col tb-col">
                                <span>{{ $work->org_name }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span>{{ $work->org_address }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ \Carbon\Carbon::parse($work->start_date)->format('F j, Y') }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ \Carbon\Carbon::parse($work->end_date)->format('F j, Y') }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $work->hours_no }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $work->position }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                            data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                    <button type="button" class="btn d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#EditWork{{ $work->id }}">
                                                        <em class="icon ni ni-edit text-warning"></em>
                                                        <span class="ml-2">Edit</span>
                                                    </button>
                                                </li>
                                                <li>
                                                    <form method="post" action="{{ route('delete.voluntary_work', $work->id) }}">
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
                        <!-- Edit Volunteer Modal -->
                        <div class="modal fade" tabindex="-1" id="EditWork{{ $work->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <em class="icon ni ni-cross text-danger"></em>
                                    </a>
                                    <div class="modal-header bg-primary bg-opacity-50">
                                        <h5 class="modal-title text-white">Edit Voluntary Works</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('edit.voluntary_work', $work->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label class="form-label" for="org_name">Organization Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="org_name" name="org_name" required="" value="{{ $work->org_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="org_address">Organization Address</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="org_address" name="org_address" required="" value="{{ $work->org_address }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Inclusive Dates</label>
                                                <div class="form-control-wrap">
                                                    <div class="input-daterange date-picker-range input-group">
                                                        <input type="text" class="form-control" name="start_date"  required value="{{ \Carbon\Carbon::parse($work->start_date)->format('m/d/Y') }}">
                                                        <div class="input-group-addon">TO</div>
                                                        <input type="text" class="form-control" name="end_date"  required value="{{ \Carbon\Carbon::parse($work->end_date)->format('m/d/Y') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="hours_no">Number of Hours</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="hours_no" name="hours_no" required="" value="{{ $work->hours_no }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="position">Position / Nature of Work</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="position" name="position" value="{{ $work->position }}">
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

<!-- Add Volunteer Modal -->
<div class="modal fade" tabindex="-1" id="AddVolunteer">
    <div class="modal-dialog">
        <div class="modal-content">
            <a  href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross text-danger"></em>
            </a>
            <div class="modal-header bg-primary bg-opacity-50">
                <h5 class="modal-title text-white">Add Voluntary Works</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.voluntary_work', $personnel->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="org_name">Organization Name</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="org_name" name="org_name" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="org_address">Organization Address</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="org_address" name="org_address" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Inclusive Dates</label>
                        <div class="form-control-wrap">
                          <div class="input-daterange date-picker-range input-group">
                            <input type="text" class="form-control" name="start_date" data-date-format="yyyy-mm-dd" required />
                            <div class="input-group-addon">TO</div>
                            <input type="text" class="form-control" name="end_date" data-date-format="yyyy-mm-dd" required />
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="hours_no">Number of Hours</label>
                      <div class="form-control-wrap">
                        <input type="text" class="form-control" id="hours_no" name="hours_no" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="position">Position / Nature of Work</label>
                      <div class="form-control-wrap">
                        <input type="text" class="form-control" id="position" name="position">
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
