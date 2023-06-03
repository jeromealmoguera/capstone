@extends('admin.index')
@section('page')
<div class="container-fluid">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Personnel Lists</h4>
                <div class="nk-block-des">
                    <p>You have <strong class="text-danger">({{ $personnelCount }})</strong> in total.</p>
                </div>
            </div>
            <div class="nk-block-head-content mt-2">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu">
                        <em class="icon ni ni-menu-alt-r"></em>
                    </a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown" aria-expanded="false">
                                        <em class="d-none d-sm-inline icon ni ni-filter-alt"></em>
                                        <span>Inactive</span>
                                        <em class="dd-indc icon ni ni-chevron-right"></em>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="{{ route('personnel-list') }}"><span>All</span></a></li>
                                            <li><a href="{{ route('personnel.active') }}"><span>Active</span></a></li>
                                            <li><a href="{{ route('personnel.inactive') }}"><span>Inactive</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <!-- Add a container for the buttons above the table -->
                <div id="tableButtons" class="mb-3" style="display: none;">
                    <button id="deleteAllButton" class="btn btn-danger">Delete All</button>
                </div>
                <table id="personnelTable" class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="uid">
                                    <label class="custom-control-label" for="uid"></label>
                                </div>
                            </th>
                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Rank</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Station</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-end">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personnels as $personnel)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="{{ $personnel->id }}">
                                    <label class="custom-control-label" for="{{ $personnel->id }}"></label>
                                </div>
                            </td>
                            <td class="nk-tb-col">
                                <a href="{{ route('view.personnel.profile',['id' => $personnel->id]) }}">
                                    <div class="user-card">
                                        <div
                                            class="user-avatar {{ 'bg-' . collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random() }} d-none d-sm-flex">
                                            <span>{{ strtoupper(substr($personnel->first_name, 0, 1)) }}{{ strtoupper(substr($personnel->last_name, 0, 1)) }}</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="tb-lead">{{ $personnel->first_name }}
                                                {{ $personnel->last_name }}<span
                                                    class="dot dot-success d-md-none ms-1"></span></span>
                                            {{-- <span>info@softnio.com</span> --}}
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td class="nk-tb-col tb-col-mb" id="user-rank">
                                <span>{{ $personnel->ranks }}</span></span>
                            </td>
                            <td class="nk-tb-col tb-col-lg">
                                <span>{{ $personnel->station }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                @if($personnel->status === 'Active')
                                <span class="text-success">{{ ($personnel->status) }}</span>
                                @elseif($personnel->status === 'Inactive')
                                <span class="text-danger">{{ ($personnel->status) }}</span>
                                @endif
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li class="nk-tb-action-hidden">
                                        <a href="{{ route('view.personnel.profile', ['id' => $personnel->id]) }}"
                                            class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="View Details">
                                            <em class="icon ni ni-eye-fill"></em>
                                        </a>
                                    </li>
                                    <li class="nk-tb-action-hidden">
                                        <a href="{{ route('send.sms', ['mobile_no' => $personnel->mobile_no]) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Send SMS">
                                            <em class="icon ni ni-comments"></em>
                                        </a>
                                    </li>
                                    <li class="nk-tb-action-hidden">
                                        <a href="{{ route('view.personnel.documents', ['id' => $personnel->id]) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Documents">
                                            <em class="icon ni ni-folder-list"></em>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    @if($personnel->status === 'Active')
                                                    <li>
                                                        <a href="{{ route('change.personnel.status', ['id' => $personnel->id, 'status' => 'Inactive']) }}">
                                                            <em class="icon ni ni-cross-circle-fill"></em>
                                                            <span>Change to Inactive</span>
                                                        </a>
                                                    </li>
                                                    @elseif($personnel->status === 'Inactive')
                                                    <li>
                                                        <a href="{{ route('change.personnel.status', ['id' => $personnel->id, 'status' => 'Active']) }}">
                                                            <em class="icon ni ni-check-circle-fill"></em>
                                                            <span>Change to Active</span>
                                                        </a>
                                                    </li>
                                                    @endif
                                                    <li>
                                                        <a href="{{ route('view.personnel.profile',['id' => $personnel->id]) }}">
                                                            <em class="icon ni ni-eye"></em>
                                                            <span>Overview</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('edit.personnel', $personnel->id) }}">
                                                            <em class="icon ni ni-edit"></em>
                                                            <span>Update Details</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <em class="icon ni ni-account-setting-alt"></em>
                                                            <span>Account Settings</span>
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="{{ route('view.personnel.documents', ['id' => $personnel->id]) }}">
                                                            <em class="icon ni ni-folder-list"></em>
                                                            <span>Documents</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('send.sms', ['mobile_no' => $personnel->mobile_no]) }}">
                                                            <em class="icon ni ni-comments"></em>
                                                            <span>Send SMS</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr><!-- .nk-tb-item  -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // When any checkbox is clicked
        $('input[type="checkbox"]').on('change', function() {
            // Get the number of checked checkboxes
            var checkedCount = $('input[type="checkbox"]:checked').length;

            // Show or hide the buttons based on the checked count
            if (checkedCount >= 2) {
                $('#tableButtons').show();
            } else {
                $('#tableButtons').hide();
            }

            // Update the mobile numbers in the input field
            updateMobileNumbers();
        });

        // When the table head checkbox is clicked
        $('#uid').on('change', function() {
            // Get the state of the table head checkbox
            var isChecked = $(this).prop('checked');

            // Set the state of all checkboxes in the table body to match
            $('#personnelTable tbody').find('input[type="checkbox"]').prop('checked', isChecked);

            // Show or hide the buttons based on the checkbox state
            if (isChecked) {
                $('#tableButtons').show();
            } else {
                $('#tableButtons').hide();
            }

            // Update the mobile numbers in the input field
            updateMobileNumbers();
        });

        // When the "Message All" button is clicked
        $('#messageAllButton').on('click', function(e) {
            e.preventDefault();

            // Get the selected mobile numbers
            var mobileNumbers = [];

            // Iterate over the checked checkboxes
            $('input[type="checkbox"]:checked').each(function() {
                var mobileNo = $(this).closest('tr').data('mobile-no');

                if (mobileNo) {
                    mobileNumbers.push(mobileNo);
                }
            });

            // Redirect to the send SMS route with mobile numbers as query parameter
            var sendSmsUrl = "{{ route('send.sms') }}?mobile_no=" + encodeURIComponent(mobileNumbers.join(','));
            window.location.href = sendSmsUrl;
        });

        // Function to update the mobile numbers in the input field
        function updateMobileNumbers() {
            var mobileNumbers = [];

            // Iterate over the checked checkboxes
            $('input[type="checkbox"]:checked').each(function() {
                var mobileNo = $(this).closest('tr').data('mobile-no');

                if (mobileNo) {
                    mobileNumbers.push(mobileNo);
                }
            });

            // Update the input field value with the comma-separated mobile numbers
            $('#mobileNoInput').val(mobileNumbers.join(', '));
        }
    });
</script>


@endsection
