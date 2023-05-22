@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="components-preview wide-md mx-auto">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Edit Personnel Information</h3>
                            <div class="nk-block-des text-soft">
                                {{-- <p>You have total <code></code> users.</p> --}}
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        {{-- <li><a href="#" class="btn btn-primary btn-outline-light"><em class="icon ni ni-plus"></em></a></li> --}}
                                        <li>
                                            <a href="{{ route('view.profile', $personnel->id) }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                            <a href="{{ route('view.profile', $personnel->id) }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div>
                <div class="nk-block nk-block-lg">
                    <form action="{{ route('update.personnel', $personnel->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card card-bordered card-preview">
                            <div class="card-inner">
                                <div class="preview-block">
                                    <span class="preview-title-lg overline-title">Personal Information</span>
                                    <div class="row gy-4">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="first_name">First Name <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $personnel->first_name }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="middle_name">Middle Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $personnel->middle_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="last_name">Last Name <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $personnel->last_name }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="birth_date">Date of Birth <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control date-picker-alt" id="birth_date" name="birth_date" value="{{ \Carbon\Carbon::parse($personnel->birth_date)->format('m/d/Y') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="birth_place">Birth Place <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="birth-place" name="birth_place" value="{{ $personnel->birth_place }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="gender">Gender <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="gender" name="gender" required>
                                                        <option>Select Gender</option>
                                                        <option value="Male" @if($personnel->gender == 'Male') selected @endif>Male</option>
                                                        <option value="Female" @if($personnel->gender == 'Female') selected @endif>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="civil_status">Civil Status <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="civil_status" name="civil_status"  required>
                                                    <option value="Single" {{ $personnel->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                                                    <option value="Married" {{ $personnel->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                                                    <option value="Legally Separated" {{ $personnel->civil_status == 'Legally Separated' ? 'selected' : '' }}>Legally Separated</option>
                                                    <option value="Separated" {{ $personnel->civil_status == 'Separated' ? 'selected' : '' }}>Separated</option>
                                                    <option value="Divorced" {{ $personnel->civil_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="citizenship">Citizenship <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="citizenship" name="citizenship" value="{{ $personnel->citizenship }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="blood_type">Blood Type</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="blood_type" name="blood_type">
                                                        <option >Select Blood Type</option>
                                                        <option value="A+" {{ $personnel->blood_type == 'A+' ? 'selected' : '' }}>A+</option>
                                                        <option value="A-" {{ $personnel->blood_type == 'A-' ? 'selected' : '' }}>A-</option>
                                                        <option value="B+" {{ $personnel->blood_type == 'B+' ? 'selected' : '' }}>B+</option>
                                                        <option value="B-" {{ $personnel->blood_type == 'B-' ? 'selected' : '' }}>B-</option>
                                                        <option value="AB+" {{ $personnel->blood_type == 'AB+' ? 'selected' : '' }}>AB+</option>
                                                        <option value="AB-" {{ $personnel->blood_type == 'AB-' ? 'selected' : '' }}>AB-</option>
                                                        <option value="O+" {{ $personnel->blood_type == 'O+' ? 'selected' : '' }}>O+</option>
                                                        <option value="O-" {{ $personnel->blood_type == 'O-' ? 'selected' : '' }}>O-</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="height">Height (cm)</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="height" name="height" value="{{ $personnel->height }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="weight">Weight (kg)</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="weight" name="weight" value="{{ $personnel->weight }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="tel_no">Telephone No.</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="tel_no" name="tel_no" value="{{ $personnel->tel_no }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="mobile_no">Mobile No.</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="{{ $personnel->mobile_no }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="preview-hr">
                                    <span class="preview-title-lg overline-title">Current Address</span>
                                    <div class="row gy-4">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="current_province">Province <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="province" value="{{ $personnel->current_province }}" name="current_province" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="current_city">City / Municipality <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="city" value="{{ $personnel->current_city }}" name="current_city" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label class="form-label" for="current_street">Street / House # / Bldg. / Floor & Unit <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="street" value="{{ $personnel->current_street }}" name="current_street" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="form-label" for="current_zip">Zip Code <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="zip-code" value="{{ $personnel->current_zip }}" name="current_zip" required>
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
                                                    <input type="text" class="form-control" id="home_province" value="{{ $personnel->home_province }}" name="home_province" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="home_city">City / Municipality <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="home_city" value="{{ $personnel->home_city }}" name="home_city" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label class="form-label" for="home_street">Street / House # / Bldg. / Floor & Unit <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="home_street" value="{{ $personnel->home_street }}" name="home_street" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="form-label" for="home_zip">Zip Code <span class="text-danger"> *</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="home_zip" value="{{ $personnel->home_zip }}" name="home_zip" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
