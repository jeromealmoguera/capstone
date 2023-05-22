@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="components-preview wide-md mx-auto">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title fw-bold text-primary">Add Personnel Information</h4>
                            <div class="nk-block-des text-soft text-info">
                               <p>Provide the information of the user below.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        {{-- <li><a href="#" class="btn btn-primary btn-outline-light"><em class="icon ni ni-plus"></em></a></li> --}}
                                        <li>
                                            <a href="{{ route('user.lists') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                            <a href="{{ route('user.lists') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div>
                <div class="nk-block nk-block-lg">
                    <form action="{{ route('personnel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-bordered card-preview">
                            <div class="card-inner">
                                <div class="preview-block">
                                    <div class="text-center">
                                        <div class="nk-kycfm-title">
                                            <h5 class="fw-bold text-primary">Personal Details</h5>
                                            <p class="sub-title"><em>Enter personal information required for identification</em></p>
                                        </div>
                                    </div><!-- nk-kycfm-head -->
                                    <hr class="preview-hr">
                                    <div class="row gy-4">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="first_name">First Name <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="middle_name">Middle Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="last_name">Last Name <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="birth_date">Date of Birth <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control date-picker-alt" id="birth_date" name="birth_date" placeholder="mm/dd/yyyy" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="birth_place">Birth Place <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="birth-place" name="birth_place" placeholder="Birth Place" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="gender">Gender <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="gender" name="gender" required>
                                                        <option>Select Gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="civil_status">Civil Status <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="civil_status" name="civil_status"  required>
                                                        <option>Select Civil Status</option>
                                                        <option>Single</option>
                                                        <option>Married</option>
                                                        <option>Legally Separated</option>
                                                        <option>Separated</option>
                                                        <option>Divorced</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="citizenship">Citizenship <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="Citizenship" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="blood_type">Blood Type</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="blood_type" name="blood_type">
                                                        <option >Select Blood Type</option>
                                                        <option>A+</option>
                                                        <option>A-</option>
                                                        <option>B+</option>
                                                        <option>B-</option>
                                                        <option>AB+</option>
                                                        <option>AB-</option>
                                                        <option>O+</option>
                                                        <option>O-</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="height">Height (ft)</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="height" name="height" placeholder="Height">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="weight">Weight (kg)</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="weight" name="weight" placeholder="Weight">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="tel_no">Telephone No.</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="tel_no" name="tel_no" placeholder="Telephone No.">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="mobile_no">Mobile No.</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile No." required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="preview-hr">
                                    <div class="text-center">
                                        <div class="nk-kycfm-title">
                                            <h5 class="fw-bold text-primary">Address</h5>
                                            <p class="sub-title"><em>Enter the user's current and home addresss</em></p>
                                        </div>
                                    </div><!-- nk-kycfm-head -->
                                    <hr class="preview-hr">
                                    <span class="preview-title-lg overline-title">Current Address</span>
                                    <div class="row gy-4">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="current_province">Province <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="province" placeholder="Province" name="current_province" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="current_city">City / Municipality <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="city" placeholder="City / Municipality" name="current_city" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label class="form-label" for="current_street">Street / House # / Bldg. / Floor & Unit <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="street" placeholder="Street / House # / Bldg. / Floor & Unit" name="current_street" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="form-label" for="current_zip">Zip Code <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="zip-code" placeholder="Zip Code" name="current_zip" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="preview-hr">
                                    <span class="preview-title-lg overline-title">Home Address</span>
                                    <div class="row gy-4">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="home_province">Province <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="home_province" placeholder="Province" name="home_province" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="home_city">City / Municipality <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="home_city" placeholder="City / Municipality" name="home_city" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label class="form-label" for="home_street">Street / House # / Bldg. / Floor & Unit <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="home_street" placeholder="Street / House # / Bldg. / Floor & Unit" name="home_street" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="form-label" for="home_zip">Zip Code <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="home_zip" placeholder="Zip Code" name="home_zip" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="preview-hr">
                                    <div class="text-center">
                                        <div class="nk-kycfm-title">
                                            <h5 class="fw-bold text-primary">Police Details</h5>
                                            <p class="sub-title"><em>Enter user's police details</em></p>
                                        </div>
                                    </div><!-- nk-kycfm-head -->
                                     <hr class="preview-hr">
                                    <div class="row gy-4">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="ranks">Rank <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="ranks" name="ranks" data-placeholder="rank" required>
                                                        <option >Select Rank</option>
                                                        <option>Patrolman
                                                        </option>
                                                        <option>Patrolwoman
                                                        </option>
                                                        <option >
                                                            Police Corporal</option>
                                                        <option>
                                                            Police Staff Sergeant</option>
                                                        <option>
                                                            Police Master Sergeant</option>
                                                        <option >
                                                            Police Senior Master Sergeant</option>
                                                        <option>
                                                            Police Chief Master Sergeant</option>
                                                        <option>
                                                            Police Executive Master Sergeant</option>
                                                        <option>
                                                            Police Lieutenant</option>
                                                        <option>
                                                            Police Captain</option>
                                                        <option>
                                                            Police Major</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="unit">Unit <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="unit" name="unit" placeholder="Unit" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="sub_unit">Sub-Unit <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="sub-unit" name="sub_unit" placeholder="Sub-Unit" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="station">Station <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="station" name="station" placeholder="Station" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="designation">Designation <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="status">Status <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="personnel-status" name="status" data-placeholder="Status" required>
                                                        <option>Select Status
                                                        </option>
                                                        <option>Active
                                                        </option>
                                                        <option>Inactive
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </d`iv>
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- .nk-block -->
            </div><!-- .components-preview -->
        </div>
    </div>
</div>
@endsection
