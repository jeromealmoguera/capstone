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
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                            <rect x="5" y="7" width="60" height="56" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <rect x="25" y="27" width="60" height="56" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <rect x="15" y="17" width="60" height="56" rx="7" ry="7" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="15" y1="29" x2="75" y2="29" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                            <circle cx="53" cy="23" r="2" fill="#c4cefe" />
                                            <circle cx="60" cy="23" r="2" fill="#c4cefe" />
                                            <circle cx="67" cy="23" r="2" fill="#c4cefe" />
                                            <rect x="22" y="39" width="20" height="20" rx="2" ry="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <circle cx="32" cy="45.81" r="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <path d="M29,54.31a3,3,0,0,1,6,0" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="49" y1="40" x2="69" y2="40" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="49" y1="51" x2="69" y2="51" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="49" y1="57" x2="59" y2="57" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="64" y1="57" x2="66" y2="57" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="49" y1="46" x2="59" y2="46" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="64" y1="46" x2="66" y2="46" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        </svg>
                                    </div>
                                    <div> <span class="title fw-bold fs-17px">Users</span> <span class="fw-medium"></span></div>
                                    <a class="fw-medium" href="{{ route('user.lists') }}">View Users</a>
                                </div><!-- .preview-icon-box -->
                            </li><!-- .col -->
                            <li class="col-lg-3 col-sm-6 col-12">
                                <div class="preview-icon-box card card-bordered">
                                    <div class="preview-icon-wrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                            <rect x="5" y="7" width="60" height="56" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <rect x="25" y="27" width="60" height="56" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <rect x="15" y="17" width="60" height="56" rx="7" ry="7" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="15" y1="29" x2="75" y2="29" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                            <circle cx="53" cy="23" r="2" fill="#c4cefe" />
                                            <circle cx="60" cy="23" r="2" fill="#c4cefe" />
                                            <circle cx="67" cy="23" r="2" fill="#c4cefe" />
                                            <rect x="22" y="39" width="20" height="20" rx="2" ry="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <circle cx="32" cy="45.81" r="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <path d="M29,54.31a3,3,0,0,1,6,0" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="49" y1="40" x2="69" y2="40" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="49" y1="51" x2="69" y2="51" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="49" y1="57" x2="59" y2="57" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="64" y1="57" x2="66" y2="57" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="49" y1="46" x2="59" y2="46" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="64" y1="46" x2="66" y2="46" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        </svg>
                                    </div>
                                    <div> <span class="title fw-bold fs-17px">Personnel</span> <span class="fw-medium"></span></div>
                                    <a class="fw-medium" href="{{ route('personnel-list') }}">View Personnel</a>
                                </div><!-- .preview-icon-box -->
                            </li><!-- .col -->
                            <li class="col-lg-3 col-sm-6 col-12">
                                <div class="preview-icon-box card card-bordered">
                                    <div class="preview-icon-wrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                            <rect x="5" y="5" width="53.97" height="69.95" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <path d="M51.66,15H22.4A7.22,7.22,0,0,0,15,22V78a7.21,7.21,0,0,0,7.41,7H61.56A7.2,7.2,0,0,0,69,78V30.5Z" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <polyline points="68.96 30.98 51.97 30.91 51.97 15.99" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="23" y1="34" x2="44" y2="34" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="23" y1="42" x2="57" y2="42" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="23" y1="50" x2="57" y2="50" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="23" y1="58" x2="32" y2="58" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <ellipse cx="61.1" cy="61.11" rx="23.9" ry="23.89" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <polygon points="69.56 74.43 47.7 52.84 52.46 48.15 74.32 69.74 69.56 74.43" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="54.98" y1="51.16" x2="54.22" y2="51.91" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="57.62" y1="53.77" x2="55.59" y2="55.78" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="71.22" y1="67.2" x2="70.46" y2="67.95" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="68.87" y1="64.88" x2="66.84" y2="66.89" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <path d="M69.55,48.21l5,4.89L55.42,72H51V67.6Z" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="65.67" y1="52.24" x2="70.35" y2="56.86" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        </svg>
                                    </div>
                                    <div> <span class="title fw-bold fs-17px">Documents</span> <span class="fw-medium">10</span></div>
                                    <a class="fw-medium" href="#">View Documents</a>
                                </div><!-- .preview-icon-box -->
                            </li><!-- .col -->
                            <li class="col-lg-3 col-sm-6 col-12">
                                <div class="preview-icon-box card card-bordered">
                                    <div class="preview-icon-wrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 118">
                                            <path d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z" transform="translate(0 -1)" fill="#f6faff" />
                                            <rect x="18" y="32" width="84" height="50" rx="4" ry="4" fill="#fff" />
                                            <rect x="26" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <rect x="50" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <rect x="74" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <rect x="38" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <rect x="62" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <path d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z" transform="translate(0 -1)" fill="#798bff" />
                                            <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="#6576ff" />
                                            <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                            <line x1="40" y1="22" x2="57" y2="22" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="40" y1="27" x2="57" y2="27" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="40" y1="32" x2="50" y2="32" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                            <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                            <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                            <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                            <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff" stroke-miterlimit="10" />
                                            <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff" stroke-miterlimit="10" />
                                        </svg>
                                    </div>
                                    <div> <span class="title fw-bold fs-17px">Comments</span> <span class="fw-medium">05</span></div>
                                    <a class="fw-medium" href="html/cms/comments.html">View Comments</a>
                                </div><!-- .preview-icon-box -->
                            </li><!-- .col -->
                        </ul><!-- .row -->
                    </div><!-- .col -->
                    <div class="col-lg-7 col-xxl-6">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="card-title-group pb-3 g-2">
                                    <div class="card-title card-title-sm">
                                        <h6 class="title">Audience Overview</h6>
                                        <p>How have your users, sessions, bounce rate metrics trended.</p>
                                    </div>
                                    <div class="card-tools shrink-0 d-none d-sm-block">
                                        <ul class="nav nav-switch-s2 nav-tabs bg-white">
                                            <li class="nav-item"><a href="#" class="nav-link">7 D</a></li>
                                            <li class="nav-item"><a href="#" class="nav-link active">1 M</a></li>
                                            <li class="nav-item"><a href="#" class="nav-link">3 M</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="analytic-ov">
                                    <div class="analytic-data-group analytic-ov-group g-3">
                                        <div class="analytic-data analytic-ov-data">
                                            <div class="title">Users</div>
                                            <div class="amount">2.57K</div>
                                            <div class="change up"><em class="icon ni ni-arrow-long-up"></em>12.37%</div>
                                        </div>
                                        <div class="analytic-data analytic-ov-data">
                                            <div class="title">Sessions</div>
                                            <div class="amount">3.98K</div>
                                            <div class="change up"><em class="icon ni ni-arrow-long-up"></em>47.74%</div>
                                        </div>
                                        <div class="analytic-data analytic-ov-data">
                                            <div class="title">Users</div>
                                            <div class="amount">28.49%</div>
                                            <div class="change down"><em class="icon ni ni-arrow-long-down"></em>12.37%</div>
                                        </div>
                                        <div class="analytic-data analytic-ov-data">
                                            <div class="title">Users</div>
                                            <div class="amount">7m 28s</div>
                                            <div class="change down"><em class="icon ni ni-arrow-long-down"></em>0.35%</div>
                                        </div>
                                    </div>
                                    <div class="analytic-ov-ck">
                                        <canvas class="analytics-line-large" id="analyticOvData"></canvas>
                                    </div>
                                    <div class="chart-label-group ms-5">
                                        <div class="chart-label">01 Jan, 2020</div>
                                        <div class="chart-label d-none d-sm-block">15 Jan, 2020</div>
                                        <div class="chart-label">30 Jan, 2020</div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-md-6 col-lg-5 col-xxl-3">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title card-title-sm">
                                        <h6 class="title">Traffic Channel</h6>
                                    </div>
                                    <div class="card-tools">
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-bs-toggle="dropdown">30 Days</a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><span>7 Days</span></a></li>
                                                    <li><a href="#"><span>15 Days</span></a></li>
                                                    <li><a href="#"><span>30 Days</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="traffic-channel">
                                    <div class="traffic-channel-doughnut-ck">
                                        <canvas class="analytics-doughnut" id="TrafficChannelDoughnutData"></canvas>
                                    </div>
                                    <div class="traffic-channel-group g-2">
                                        <div class="traffic-channel-data">
                                            <div class="title"><span class="dot dot-lg sq" data-bg="#9cabff"></span><span>Organic Search</span></div>
                                            <div class="amount">4,305 <small>58.63%</small></div>
                                        </div>
                                        <div class="traffic-channel-data">
                                            <div class="title"><span class="dot dot-lg sq" data-bg="#b8acff"></span><span>Social Media</span></div>
                                            <div class="amount">859 <small>23.94%</small></div>
                                        </div>
                                        <div class="traffic-channel-data">
                                            <div class="title"><span class="dot dot-lg sq" data-bg="#ffa9ce"></span><span>Referrals</span></div>
                                            <div class="amount">482 <small>12.94%</small></div>
                                        </div>
                                        <div class="traffic-channel-data">
                                            <div class="title"><span class="dot dot-lg sq" data-bg="#f9db7b"></span><span>Others</span></div>
                                            <div class="amount">138 <small>4.49%</small></div>
                                        </div>
                                    </div><!-- .traffic-channel-group -->
                                </div><!-- .traffic-channel -->
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-md-6 col-xxl-3">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="card-title-group align-start pb-3 g-2">
                                    <div class="card-title card-title-sm">
                                        <h6 class="title">Website Performance</h6>
                                        <p>How has performend this month.</p>
                                    </div>
                                    <div class="card-tools">
                                        <em class="card-hint icon ni ni-help" data-bs-toggle="tooltip" data-bs-placement="left" title="Performance of this month"></em>
                                    </div>
                                </div>
                                <div class="analytic-wp">
                                    <div class="analytic-wp-group g-3">
                                        <div class="analytic-data analytic-wp-data">
                                            <div class="analytic-wp-graph">
                                                <div class="title">Bounce Rate <span>(avg)</span></div>
                                                <div class="analytic-wp-ck">
                                                    <canvas class="analytics-line-small" id="BounceRateData"></canvas>
                                                </div>
                                            </div>
                                            <div class="analytic-wp-text">
                                                <div class="amount amount-sm">23.59%</div>
                                                <div class="change up"><em class="icon ni ni-arrow-long-up"></em>4.5%</div>
                                                <div class="subtitle">vs. last month</div>
                                            </div>
                                        </div>
                                        <div class="analytic-data analytic-wp-data">
                                            <div class="analytic-wp-graph">
                                                <div class="title">Pageviews <span>(avg)</span></div>
                                                <div class="analytic-wp-ck">
                                                    <canvas class="analytics-line-small" id="PageviewsData"></canvas>
                                                </div>
                                            </div>
                                            <div class="analytic-wp-text">
                                                <div class="amount amount-sm">5.48</div>
                                                <div class="change down"><em class="icon ni ni-arrow-long-down"></em>-1.48%</div>
                                                <div class="subtitle">vs. last month</div>
                                            </div>
                                        </div>
                                        <div class="analytic-data analytic-wp-data">
                                            <div class="analytic-wp-graph">
                                                <div class="title">New Users <span>(avg)</span></div>
                                                <div class="analytic-wp-ck">
                                                    <canvas class="analytics-line-small" id="NewUsersData"></canvas>
                                                </div>
                                            </div>
                                            <div class="analytic-wp-text">
                                                <div class="amount amount-sm">549</div>
                                                <div class="change up"><em class="icon ni ni-arrow-long-up"></em>6.8%</div>
                                                <div class="subtitle">vs. last month</div>
                                            </div>
                                        </div>
                                        <div class="analytic-data analytic-wp-data">
                                            <div class="analytic-wp-graph">
                                                <div class="title">Time on Site <span>(avg)</span></div>
                                                <div class="analytic-wp-ck">
                                                    <canvas class="analytics-line-small" id="TimeOnSiteData"></canvas>
                                                </div>
                                            </div>
                                            <div class="analytic-wp-text">
                                                <div class="amount amount-sm">3m 35s</div>
                                                <div class="change up"><em class="icon ni ni-arrow-long-up"></em>1.4%</div>
                                                <div class="subtitle">vs. last month</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .nk-block -->
        </div><!-- .nk-block -->
    </div>
</div>

@endsection
