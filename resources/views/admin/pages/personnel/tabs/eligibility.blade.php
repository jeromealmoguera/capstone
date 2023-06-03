<div class="card-inner">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Eligibility</h4>
                <div class="nk-block-des">
                    <p>You can add or edit a eligibilities.</p>
                </div>
            </div>
            <div class="nk-block-head-content ms-auto">
                <button class="btn btn-primary btn-sm d-block d-md-inline-block" data-bs-toggle="modal"
                    data-bs-target="#AddEligibility">
                    <span class="d-none d-md-inline-block">Add Eligibility</span>
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
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Rating</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Exam Date</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Location</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">License</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Validity Period</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-end">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personnel->eligibilities as $eligibility)
                        <tr class="nk-tb-item">
                            
                            <td class="nk-tb-col tb-col">
                                <span>{{ $eligibility->title }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span>{{ $eligibility->rating }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ \Carbon\Carbon::parse($eligibility->exam_date)->format('F j, Y') }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $eligibility->location }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $eligibility->license }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ \Carbon\Carbon::parse($eligibility->validity_period)->format('F j, Y') }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                            data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                    <button type="button" class="btn d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#EditEligibility{{ $eligibility->id }}">
                                                        <em class="icon ni ni-edit text-warning"></em>
                                                        <span class="ml-2">Edit</span>
                                                    </button>
                                                </li>
                                                <li>
                                                    <form method="post" action="{{ route('delete.eligibility', $eligibility->id) }}">
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
                        <!-- Edit Eligibility Modal -->
                        <div class="modal fade" tabindex="-1" id="EditEligibility{{ $eligibility->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <a  href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <em class="icon ni ni-cross text-danger"></em>
                                    </a>
                                    <div class="modal-header bg-primary bg-opacity-50">
                                        <h5 class="modal-title text-white">Edit Eligibility</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('edit.eligibility', $eligibility->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label class="form-label" for="title">Title</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="title" name="title" value="{{ $eligibility->title }}" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="rating">Rating</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="rating" name="rating" value="{{ $eligibility->rating }}" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="exam_date">Examination Date</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control date-picker" name="exam_date" required value="{{ \Carbon\Carbon::parse($eligibility->exam_date)->format('m/d/Y') }}">
                                                </div>
                                                <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="location">Location</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="location" name="location" value="{{ $eligibility->location }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="license">Licensed</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="license" name="license" value="{{ $eligibility->license }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="validity_period">Validity Period</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control date-picker" name="validity_period" required value="{{ \Carbon\Carbon::parse($eligibility->validity_period)->format('m/d/Y') }}">
                                                </div>
                                                <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary">Update</button>
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

<!-- Add Eligibility Modal -->
<div class="modal fade" tabindex="-1" id="AddEligibility">
    <div class="modal-dialog">
        <div class="modal-content">
            <a  href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross text-danger"></em>
            </a>
            <div class="modal-header bg-primary bg-opacity-50">
                <h5 class="modal-title text-white">Add Eligibility</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.eligibility', $personnel->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="title">Title</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="title" name="title" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="rating">Rating</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="rating" name="rating" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Examination Date</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control date-picker" name="exam_date">
                        </div>
                        <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="location">Location</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="license">Licensed</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="license" name="license">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="validity_period">Validity Period</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control date-picker" name="validity_period">
                        </div>
                        <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
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
