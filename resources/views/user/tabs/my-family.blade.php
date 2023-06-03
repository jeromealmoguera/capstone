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
                                            <h4 class="nk-block-title">Family Members</h4>
                                            <div class="nk-block-des">
                                                <p>You can check here all your family members information.</p>
                                                {{-- <button class="btn btn-primary btn-sm d-block d-md-inline-block" data-bs-toggle="modal"
                                                data-bs-target="#AddFamily">
                                                    <span class="d-none d-md-inline-block">Add Family Member</span>
                                                    <span class="d-md-none"><em class="icon ni ni-plus"></em></span>
                                                </button> --}}

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
                                            @foreach ($backgrounds as $background)
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
                                                                            <form method="post" action="{{ route('delete.my-familyMember', $background->id) }}">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn d-flex align-items-center" onsubmit="return confirm('Are you sure you want to delete this document?')">
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
                                                                  <form method="POST" action="{{ route('edit.my-familyMember', $background->id) }}">
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
                                        <li><a class="active" href="{{ route('view.my-family') }}"><em class="icon ni ni-home-alt"></em><span>Family Member</span>
                                        <li><a href="{{ route('view.my-education') }}"><em class="icon ni ni-reports-alt"></em><span>Education Background</span>
                                        <li><a href="{{ route('view.my-eligibility') }}"><em class="icon ni ni-note-add"></em><span>Eligibility</span>
                                        <li><a href="{{ route('view.my-experience') }}"><em class="icon ni ni-report-profit"></em><span>Work Experience</span>
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

