@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Users Lists</h3>
                    <div class="nk-block-des text-soft">
                        <p>You have a total of <code>{{ $userCount }}</code> users.</p>
                    </div>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                {{-- <li><a href="#" class="btn btn-primary btn-outline-light"><em class="icon ni ni-plus"></em></a></li> --}}
                                <li>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profile-add">
                                        <em class="icon ni ni-plus"></em>
                                        <span>Add User</span>
                                      </button>

                                      {{-- <!-- Modal -->
                                      <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('users.store') }}">
                                                    @csrf

                                                    <div class="mb-3">
                                                    <label for="username" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="username" placeholder="Enter Name" name="username" value="{{ old('username') }}" required>
                                                    @error('username')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ old('email') }}" required>
                                                    @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                                                    @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                                    <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" required>
                                                    </div>

                                                    <button type="submit" class="btn btn-info">Create User</button>
                                                </form>
                                            </div>
                                          </div>
                                        </div>
                                    </div> --}}
                                </li>
                            </ul>
                        </div>
                    </div><!-- .toggle-wrap -->
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col"><span class="sub-text">User</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Email</span></th>
                            {{-- <th class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></th> --}}
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Role</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Date Created</span></th>
                            {{-- <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th> --}}
                            <th class="nk-tb-col nk-tb-col-tools text-end">Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="nk-tb-item">

                                <td class="nk-tb-col">
                                    <div class="user-card">
                                        <div class="user-avatar {{ 'bg-' . collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random() }} d-none d-sm-flex">
                                            <span>{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="tb-lead">{{ $user->name }}<span class="dot dot-success d-md-none ms-1"></span></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="nk-tb-col tb-col-mb">
                                    <span>{{ $user->email }}</span>
                                </td>
                                {{-- <td class="nk-tb-col tb-col-md">
                                    <span>{{ $user->personnel->mobile_no }}</span>
                                </td> --}}
                                <td class="nk-tb-col tb-col-lg">
                                    <span class="badge badge-dot bg-primary">
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }}
                                            @unless ($loop->last)
                                                ,
                                            @endunless
                                        @endforeach
                                    </span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    <span>{{ $user->created_at->format('M d, Y') }}</span>
                                </td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{ route('users.show', $user) }}"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Pass</span></a></li>
                                                        {{-- <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset 2FA</span></a></li> --}}
                                                        <li>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteUser"><em class="icon ni ni-trash"></em><span>Delete</span></a>

                                                             <!-- Modal Alert 2 -->
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
    </div>
</div>
<!-- @@ Profile Add Modal @e -->
<div class="modal fade" role="dialog" id="profile-add">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Create New User</h5>
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="">Select a role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create User</button>
                    </form>

                </div><!-- .modal-body -->
            </form>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->

@endsection
