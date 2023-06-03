<div class="card-inner">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Family Members</h4>
                <div class="nk-block-des">
                    <p>You can add or edit a family member.</p>
                </div>
            </div>
            <div class="nk-block-head-content ms-auto">
                <button class="btn btn-primary btn-sm d-block d-md-inline-block" data-bs-toggle="modal"
                    data-bs-target="#AddFamily">
                    <span class="d-none d-md-inline-block">Add Family Member</span>
                    <span class="d-md-none"><em class="icon ni ni-plus"></em></span>
                </button>
            </div>
        </div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">

                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Relationship</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Occupation</span></th>
                            <th class="nk-tb-col tb-col-xl"><span class="sub-text">Employer / Business Name</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Business Address</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-end">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personnel->familyBackgrounds as $background)
                        <tr class="nk-tb-item">
                           
                            <td class="nk-tb-col">
                                <span>{{ $background->name }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span>{{ $background->relationship }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $background->occupation }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-lg">
                                <span>{{ $background->employer }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-lg">
                                <span>{{ $background->business_address }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                            data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li>
                                                    <button type="button" class="btn d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#EditFamily{{ $background->id }}">
                                                        <em class="icon ni ni-edit text-warning"></em>
                                                        <span class="ml-2">Edit</span>
                                                    </button>
                                                </li>
                                                <li>
                                                    <form id="delete-form-{{ $background->id }}" method="post" action="{{ route('delete.family-member', $background->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirmDelete">
                                                            <em class="icon ni ni-trash text-danger"></em>
                                                            <span class="ml-2">Delete</span>
                                                        </button>
                                                      </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </td>
                        </tr><!-- .nk-tb-item  -->
                        <div class="modal fade" tabindex="-1" id="confirmDelete">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Confirm Deletion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this family member record named {{ $background->id }}?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info bg-info" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" form="delete-form-{{ $background->id }}" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" tabindex="-1" id="EditFamily{{ $background->id }}"
                            aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <a href="#" class="close" data-bs-dismiss="modal"
                                          aria-label="Close">
                                          <em class="icon ni ni-cross text-danger"></em>
                                      </a>
                                      <div class="modal-header bg-primary bg-opacity-50">
                                          <h5 class="modal-title text-white">Edit Family Member
                                          </h5>
                                      </div>
                                      <div class="modal-body">
                                          <form method="POST" action="{{ route('edit.family-member', $background->id) }}">
                                              @csrf
                                              @method('PUT')
                                              <div class="form-group">
                                                  <label class="form-label"
                                                      for="name">Name</label>
                                                  <div class="form-control-wrap">
                                                      <input type="text" name="name" id="name"
                                                          class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                          value="{{ $background->name }}" required
                                                          autofocus>
                                                  </div>
                                                  @if ($errors->has('name'))
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('name') }}</strong>
                                                  </span>
                                                  @endif
                                              </div>
                                              <div class="form-group">
                                                  <label class="form-label"
                                                      for="relationship">Relationship</label>
                                                  <div class="form-control-wrap">
                                                      <input type="text" name="relationship"
                                                          id="edit-relationship" value="{{ $background->relationship }}"
                                                          class="form-control{{ $errors->has('relationship') ? ' is-invalid' : '' }}"
                                                          required>
                                                      @if ($errors->has('relationship'))
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('relationship') }}</strong>
                                                      </span>
                                                      @endif
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="form-label"
                                                      for="occupation">Occupation</label>
                                                  <div class="form-control-wrap">
                                                      <input type="text" name="occupation"
                                                          id="edit-occupation" value="{{ $background->occupation }}"
                                                          class="form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}">
                                                      @if ($errors->has('occupation'))
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('occupation') }}</strong>
                                                      </span>
                                                      @endif
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="form-label"
                                                      for="employer">Employer / Business
                                                      Name</label>
                                                  <div class="form-control-wrap">
                                                      <input type="text" name="employer"
                                                          id="edit-employer" value="{{ $background->employer }}"
                                                          class="form-control{{ $errors->has('employer') ? ' is-invalid' : '' }}">
                                                      @if ($errors->has('employer'))
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('employer') }}</strong>
                                                      </span>
                                                      @endif
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="form-label"
                                                      for="business-address">Business
                                                      Address</label>
                                                  <div class="form-control-wrap">
                                                      <input type="text" name="business_address"
                                                          id="edit-business-address" value="{{ $background->business_address }}"
                                                          class="form-control{{ $errors->has('business_address') ? ' is-invalid' : '' }}">
                                                      @if ($errors->has('business_address'))
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('business_address') }}</strong>
                                                      </span>
                                                      @endif
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <button type="submit"
                                                      class="btn btn-lg btn-primary">Update</button>
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


<!-- Add Family Modal -->
<div class="modal fade" tabindex="-1" id="AddFamily">
    <div class="modal-dialog">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross text-danger"></em>
            </a>
            <div class="modal-header bg-primary bg-opacity-50">
                <h5 class="modal-title text-white">Add Family Member</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('add.new-member', $personnel->id) }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="name" name="name" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="relationship">Relationship</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="relationship" name="relationship" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="occupation">Occupation</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="occupation" name="occupation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="employer">Employer / Business Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="employer" name="employer">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="business-address">Business Address</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="business-address" name="business_address">
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



