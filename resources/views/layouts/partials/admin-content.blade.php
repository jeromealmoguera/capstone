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
                    <div class="col-12">
                        <ul class="row g-gs preview-icon-svg">
                            <li class="col-lg-3 col-sm-6 col-12">
                                <div class="preview-icon-box card card-bordered">
                                    <div class="preview-icon-wrap">
                                        <svg viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m40 8h12" fill="none" stroke="#c4cefe" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"></path>
                                            <rect fill="#fff" height="72" rx="2" stroke="#6576ff" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" width="50" x="23.5" y="3">
                                            </rect>
                                            <path
                                                d="m26.5 13h44a0 0 0 0 1 0 0v58a2 2 0 0 1 -2 2h-40a2 2 0 0 1 -2-2v-58a0 0 0 0 1 0 0z"
                                                fill="#e3e7fe"></path>
                                            <rect fill="#fff" height="14" rx="2" stroke="#6576ff" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" width="48" x="34.5" y="65">
                                            </rect>
                                            <circle cx="23.5" cy="71" fill="#fff" r="16" stroke="#6576ff"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            </circle>
                                            <circle cx="23.5" cy="71" fill="#e3e7fe" r="12"></circle>
                                            <path
                                                d="m18.44 70h10.12a1.45 1.45 0 0 1 1.44 1.44v5.09a1.45 1.45 0 0 1 -1.44 1.47h-10.12a1.45 1.45 0 0 1 -1.44-1.47v-5.09a1.45 1.45 0 0 1 1.44-1.44z"
                                                fill="#6576ff"></path>
                                            <path d="m20 70v-2.53a3.5 3.5 0 0 1 7 0v2.53" fill="none" stroke="#6576ff"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                            <circle cx="23.5" cy="73.23" fill="#fff" r="1.5"></circle>
                                            <path
                                                d="m22.5 74.23h2a0 0 0 0 1 0 0v1.24a.76.76 0 0 1 -.76.76h-.47a.76.76 0 0 1 -.76-.76v-1.24a0 0 0 0 1 -.01 0z"
                                                fill="#fff"></path>
                                            <g fill="none" stroke="#6576ff" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5">
                                                <path d="m48.5 69.5v5"></path>
                                                <path d="m50.5 70.79-4 2.52"></path>
                                                <path d="m50.5 73.31-4-2.52"></path>
                                                <path d="m57.17 69.5v5"></path>
                                                <path d="m59.17 70.79-4 2.52"></path>
                                                <path d="m59.17 73.31-4-2.52"></path>
                                                <path d="m65.83 69.5v5"></path>
                                                <path d="m67.83 70.79-4 2.52"></path>
                                                <path d="m67.83 73.31-4-2.52"></path>
                                                <path d="m74.5 69.5v5"></path>
                                                <path d="m76.5 70.79-4 2.52"></path>
                                                <path d="m76.5 73.31-4-2.52"></path>
                                            </g>
                                            <path d="m30.5 36h34v5h-34z" fill="#fff"></path>
                                            <path d="m30.5 43.75h34v5h-34z" fill="#fff"></path>
                                            <path d="m30.5 50.5h34v7h-34z" fill="#6576ff"></path>
                                            <path d="m49.5 52.5-2.75 3-1.25-1.36" fill="none" stroke="#fff"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <circle cx="48.5" cy="23.5" fill="#c4cefe" r="7.5"></circle>
                                        </svg>
                                    </div>
                                    <div class="d-flex justify-center align-center">
                                        <div>
                                            <span class="title fw-bold fs-17px">Users</span>
                                        </div>
                                        <div class="">
                                            <span class="user-avatar xs m-1 fw-light text-white">{{ $totalUsers }}</span>
                                        </div>
                                    </div>
                                    <a class="fw-medium" href="{{ route('user.lists') }}">View</a>
                                </div><!-- .preview-icon-box -->
                            </li><!-- .col -->
                            <li class="col-lg-3 col-sm-6 col-12">
                                <div class="preview-icon-box card card-bordered">
                                    <div class="preview-icon-wrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                            <rect x="5" y="7" width="60" height="56" rx="7" ry="7" fill="#e3e7fe"
                                                stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                            <rect x="25" y="27" width="60" height="56" rx="7" ry="7" fill="#e3e7fe"
                                                stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                            <rect x="15" y="17" width="60" height="56" rx="7" ry="7" fill="#fff"
                                                stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                            <line x1="15" y1="29" x2="75" y2="29" fill="none" stroke="#6576ff"
                                                stroke-miterlimit="10" stroke-width="2" />
                                            <circle cx="53" cy="23" r="2" fill="#c4cefe" />
                                            <circle cx="60" cy="23" r="2" fill="#c4cefe" />
                                            <circle cx="67" cy="23" r="2" fill="#c4cefe" />
                                            <rect x="22" y="39" width="20" height="20" rx="2" ry="2" fill="none"
                                                stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                            <circle cx="32" cy="45.81" r="2" fill="none" stroke="#6576ff"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <path d="M29,54.31a3,3,0,0,1,6,0" fill="none" stroke="#6576ff"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="49" y1="40" x2="69" y2="40" fill="none" stroke="#6576ff"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="49" y1="51" x2="69" y2="51" fill="none" stroke="#c4cefe"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="49" y1="57" x2="59" y2="57" fill="none" stroke="#c4cefe"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="64" y1="57" x2="66" y2="57" fill="none" stroke="#c4cefe"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="49" y1="46" x2="59" y2="46" fill="none" stroke="#c4cefe"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="64" y1="46" x2="66" y2="46" fill="none" stroke="#c4cefe"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        </svg>
                                    </div>
                                    <div class="d-flex justify-center align-center">
                                        <div>
                                            <span class="title fw-bold fs-17px">Personnel</span>
                                        </div>
                                        <div class="">
                                            <span class="user-avatar xs m-1 fw-light text-white">{{ $totalPersonnel }}</span>
                                        </div>
                                    </div>
                                    <a class="fw-medium" href="{{ route('personnel-list') }}">View</a>
                                </div><!-- .preview-icon-box -->
                            </li><!-- .col -->
                            <li class="col-lg-3 col-sm-6 col-12">
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
                                            <span class="user-avatar xs m-1 fw-light text-white">{{ $totalDocuments }}</span>
                                        </div>
                                    </div>
                                        <a class="fw-medium" href="{{ route('view.documents-lists') }}">View</a>
                                </div><!-- .preview-icon-box -->
                            </li><!-- .col -->
                            <li class="col-lg-3 col-sm-6 col-12">
                                <div class="preview-icon-box card card-bordered">
                                    <div class="preview-icon-wrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 118">
                                            <path
                                                d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z"
                                                transform="translate(0 -1)" fill="#f6faff" />
                                            <rect x="18" y="32" width="84" height="50" rx="4" ry="4" fill="#fff" />
                                            <rect x="26" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <rect x="50" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <rect x="74" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <rect x="38" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <rect x="62" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <path
                                                d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z"
                                                transform="translate(0 -1)" fill="#798bff" />
                                            <path
                                                d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z"
                                                transform="translate(0 -1)" fill="#6576ff" />
                                            <path
                                                d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z"
                                                transform="translate(0 -1)" fill="none" stroke="#6576ff"
                                                stroke-miterlimit="10" stroke-width="2" />
                                            <line x1="40" y1="22" x2="57" y2="22" fill="none" stroke="#fffffe"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="40" y1="27" x2="57" y2="27" fill="none" stroke="#fffffe"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="40" y1="32" x2="50" y2="32" fill="none" stroke="#fffffe"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none" stroke="#9cabff"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none" stroke="#9cabff"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none" stroke="#9cabff"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none" stroke="#9cabff"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff"
                                                stroke-miterlimit="10" />
                                            <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff"
                                                stroke-miterlimit="10" />
                                        </svg>
                                    </div>
                                    <div class="d-flex justify-center align-center">
                                        <div>
                                            <span class="title fw-bold fs-17px">Incomplete</span>
                                        </div>
                                        <div class="">
                                            <span class="user-avatar xs m-1 fw-light text-white">{{ $incompletePersonnelCount }}</span>
                                        </div>
                                    </div>
                                    <a class="fw-medium" href="{{ route('personnel.incomplete') }}">View</a>
                                </div><!-- .preview-icon-box -->
                            </li><!-- .col -->
                        </ul><!-- .row -->
                    </div><!-- .col -->
                    <div class="col-md-6 col-xxl-6">
                        <div class="card card-bordered card-preview">
                            <div class="card-inner">
                                <div class="card-title d-flex">
                                   <div>
                                        <h6 class="title">Incomplete Required Document</h6>
                                        <p>These are the list of personnel with incomplete uploaded documents. <a href="{{ route('personnel.incomplete') }}">View All</a></p>
                                   </div>
                                </div>

                                <table class="table">
                                    <thead class="tb-odr-head">
                                        <tr class="tb-odr-item">
                                            <th class="tb-odr-info">
                                                <span class="tb-odr-id">Name</span>
                                            </th>
                                            <th>Uploaded Documents</th>
                                            <th>Issued Year</th>
                                            {{-- <th class="tb-odr-action">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="tb-odr-body">
                                        @foreach($displayedPersonnel as $person)
                                            <tr class="tb-odr-item">
                                                <td class="tb-odr-info">
                                                    <span class="tb-odr-id">{{ $person->first_name }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <span>{{ $person->documents_count }}</span>
                                                    <span>out</span>
                                                    <span>{{ count($requiredDocumentTypes) }}</span>
                                                </td>
                                                <td>{{ $previousYear }}</td>
                                                {{-- <td class="tb-odr-action">
                                                    <div class="tb-odr-btns d-none d-md-inline">
                                                        <a href="#" class="btn btn-sm btn-primary">View</a>
                                                    </div>
                                                    <div class="dropdown">
                                                        <a class="text-soft btn btn-icon btn-trigger"></a>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div><!-- .card-preview -->
                    </div>
                    <div class="col-md-6 col-xxl-6">
                        <div class="card card-bordered card-full">
                            <div class="card-inner d-flex flex-column h-100">
                                <div class="card-title-group mb-3">
                                    <div class="card-title">
                                        <h6 class="title">Uploaded Document Per Document Type</h6>
                                        <span class="fs-11px">These are the uploaded documents for documents issued in <em class="text-primary">{{ $previousYear }}</em></span>
                                    </div>
                                    {{-- <div class="card-tools mt-n4 me-n1">
                                        <div class="drodown"><a href="#"
                                                class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><span>15 Days</span></a></li>
                                                    <li><a href="#" class="active"><span>30 Days</span></a></li>
                                                    <li><a href="#"><span>3 Months</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="progress-list gy-3">
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">Personal Data Sheet</div>
                                            <div class="progress-amount">{{ $personalDataSheetCounts }}%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar" data-progress="{{ $personalDataSheetCounts }}" style="width: {{ $personalDataSheetCounts }}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">Diploma/TOR</div>
                                            <div class="progress-amount">{{ $diplomaCounts }}%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-orange" data-progress="{{ $diplomaCounts }}"
                                                style="width: {{ $diplomaCounts }}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">Trainings</div>
                                            <div class="progress-amount">{{ $trainingCounts }}%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-teal" data-progress="{{ $trainingCounts }}" style="width: {{ $trainingCounts }}%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">Specialized Trainings</div>
                                            <div class="progress-amount">{{ $specialTrainingCounts }}%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-pink" data-progress="{{ $specialTrainingCounts }}" style="width: {{ $specialTrainingCounts }}%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">Reassignments</div>
                                            <div class="progress-amount">{{ $reassignmentCounts }}%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-azure" data-progress="{{ $reassignmentCounts }}" style="width: {{ $reassignmentCounts }}%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">SALN</div>
                                            <div class="progress-amount">{{ $salNCounts }}%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar" data-progress="{{ $salNCounts }}" style="width: {{ $salNCounts }}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">PER</div>
                                            <div class="progress-amount">{{ $perCounts }}%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-orange" data-progress="{{ $perCounts }}"
                                                style="width: {{ $perCounts }}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">Physical Fitness Test</div>
                                            <div class="progress-amount">{{ $pftCounts }}%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-teal" data-progress="{{ $pftCounts }}" style="width: {{ $pftCounts }}%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">KSS</div>
                                            <div class="progress-amount">{{ $kssCounts }}%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-pink" data-progress="{{ $kssCounts }}" style="width: {{ $kssCounts }}%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">Eligibility</div>
                                            <div class="progress-amount">{{ $eligibilityCounts }}%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-azure" data-progress="{{ $eligibilityCounts }}" style="width: {{ $eligibilityCounts }}%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="invest-top-ck mt-auto">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div><canvas class="iv-plan-purchase chartjs-render-monitor" id="planPurchase"
                                        style="display: block; width: 311px; height: 50px;" width="622"
                                        height="90"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- .row -->
            </div><!-- .nk-block -->
        </div><!-- .nk-block -->
    </div>
</div>

@endsection
