@extends('layouts.partials.admin')

@section('page')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Dashboard</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                    class="icon ni ni-more-v"></em></a>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->

            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-lg-6">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-title mb-4">
                                    <h4 class="title">Welcome! <span
                                            class="text-primary fw-normal fs-28px">{{ Auth::user()->name }}</span></h4>
                                </div>
                                <div class="row g-gs">

                                    <div class="fake-class">
                                        <div class=" text-soft">
                                            <p>You can view and edit your profile by clicking the button.</p>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-md-6 mt-4">View Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="row g-gs preview-icon-svg">
                            <li class="col-lg-12 col-sm-12 col-12">
                                <div class="preview-icon-box card card-bordered">
                                    <div class="preview-icon-wrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                            <rect x="5" y="5" width="53.97" height="69.95" rx="7" ry="7" fill="#e3e7fe"
                                                stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                            <path
                                                d="M51.66,15H22.4A7.22,7.22,0,0,0,15,22V78a7.21,7.21,0,0,0,7.41,7H61.56A7.2,7.2,0,0,0,69,78V30.5Z"
                                                fill="#fff" stroke="#6576ff" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" />
                                            <polyline points="68.96 30.98 51.97 30.91 51.97 15.99" fill="none"
                                                stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                            <line x1="23" y1="34" x2="44" y2="34" fill="none" stroke="#c4cefe"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="23" y1="42" x2="57" y2="42" fill="none" stroke="#c4cefe"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="23" y1="50" x2="57" y2="50" fill="none" stroke="#c4cefe"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="23" y1="58" x2="32" y2="58" fill="none" stroke="#c4cefe"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <ellipse cx="61.1" cy="61.11" rx="23.9" ry="23.89" fill="#fff"
                                                stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                            <polygon points="69.56 74.43 47.7 52.84 52.46 48.15 74.32 69.74 69.56 74.43"
                                                fill="none" stroke="#6576ff" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" />
                                            <line x1="54.98" y1="51.16" x2="54.22" y2="51.91" fill="none"
                                                stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                            <line x1="57.62" y1="53.77" x2="55.59" y2="55.78" fill="none"
                                                stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                            <line x1="71.22" y1="67.2" x2="70.46" y2="67.95" fill="none"
                                                stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                            <line x1="68.87" y1="64.88" x2="66.84" y2="66.89" fill="none"
                                                stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                            <path d="M69.55,48.21l5,4.89L55.42,72H51V67.6Z" fill="none" stroke="#6576ff"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="65.67" y1="52.24" x2="70.35" y2="56.86" fill="none"
                                                stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                        </svg>
                                    </div>
                                    <div class="d-flex justify-center align-center">
                                        <div>
                                            <span class="title fw-bold fs-17px">Documents</span>
                                        </div>
                                        <div class="">
                                            <span class="user-avatar xs m-1 fw-light text-white"></span>
                                        </div>
                                    </div>

                                </div><!-- .preview-icon-box -->
                            </li><!-- .col -->
                        </ul><!-- .row -->
                    </div><!-- .col -->
                </div>
            </div>

        </div><!-- .nk-block -->
    </div>
</div>

@endsection
