<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>User - Kanban</title>
    <link rel="shortcut icon" href="../../images/favicon.png">
    <link rel="stylesheet" href="../../assets/css/style926d.css?v1.1.1">
</head>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <div class="nk-app-root">
        <div class="nk-main">
            <div class="nk-wrap">
                @include('layout.nav_bar')
                <div class="nk-content">
                    <div class="container">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-between flex-wrap gap g-2">
                                        <div class="nk-block-head-content">
                                            <h2 class="nk-block-title">Users</h1>
                                                <nav>
                                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">
                                                            Users List</li>
                                                    </ol>
                                                </nav>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <ul class="d-flex">
                                                @if (auth()->user()->role_id == 4)
                                                    <li>
                                                        <a href="#" class="btn btn-md d-md-none btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#createTicketModal">
                                                            <em class="icon ni ni-plus"></em><span>Assign</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="btn btn-primary d-none d-md-inline-flex"
                                                            data-bs-toggle="modal" data-bs-target="#createTicketModal">
                                                            <em class="icon ni ni-plus"></em><span>Assign User</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="card">
                                        <table class="datatable-init table" data-nk-container="table-responsive">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="tb-col"><span class="overline-title">S/N</span></th>
                                                    <th class="tb-col"><span class="overline-title">User name</span>
                                                    </th>
                                                    <th class="tb-col"><span class="overline-title">Email</span> </th>
                                                    <th class="tb-col"><span class="overline-title">Role</span> </th>
                                                    <th class="tb-col tb-col-xl"><span
                                                            class="overline-title">date</span></th>
                                                    <th class="tb-col tb-col-end" data-sortable="false">
                                                        <span class="overline-title">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    @if ($user->role_id != 4)
                                                        <tr>
                                                            <td class="tb-col tb-col-check"> <span> {{ $i++ }}
                                                                </span> </td>
                                                            <td class="tb-col tb-col-xl">
                                                                <span>{{ $user->name }}</span>
                                                            </td>
                                                            <td class="tb-col tb-col-xl">
                                                                <span>{{ $user->email }}</span>
                                                            </td>
                                                            <td class="tb-col tb-col-xl"><span>
                                                                    @if ($user->role_id == 1)
                                                                        Developer
                                                                    @elseif($user->role_id == 2)
                                                                        Customer
                                                                    @elseif($user->role_id == 3)
                                                                        Project Manager
                                                                    @endif
                                                                </span></td>
                                                            <td class="tb-col tb-col-xl">
                                                                <span>{{ $user->created_at }}</span>
                                                            </td>
                                                            <td class="tb-col tb-col-end">
                                                                <div class="d-flex justify-content-end gap g-2">
                                                                    <div class="gap-col">
                                                                        <a href="delete_user?id={{ $user->id }}"
                                                                            class="btn btn-sm btn-lighter"> <em
                                                                                class="icon ni ni-delete"></em> </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layout.footer')
            </div>
        </div>
    </div>
</body>
<script src="../../assets/js/bundle.js"></script>
<script src="../../assets/js/scripts.js"></script>

<div class="modal fade" id="createTicketModal" tabindex="-1" aria-labelledby="createTicketModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createTicketModalLabel">Assign Role</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('assign-role') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="form-group"><label class="form-label">Users</label>
                                <div class="form-control-wrap">
                                    <select class="js-select" name="id" data-sort="false">
                                        <option value="">Select a user</option>
                                        @foreach ($users as $user)
                                            @if ($user->role_id != 4)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group"><label class="form-label">Role</label>
                                <div class="form-control-wrap">
                                    <select class="js-select" name="role" data-sort="false">
                                        <option value="">Select a role</option>
                                        <option value="1">Developer</option>
                                        <option value="2">Customer</option>
                                        <option value="3">Project Manager</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="d-flex gap g-2">
                                <div class="gap-col"><button class="btn btn-primary" type="submit">Assign</button>
                                </div>
                                <div class="gap-col"><button type="button" class="btn border-0"
                                        data-bs-dismiss="modal">Discard</button></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/js/data-tables/data-tables.js"></script>

</html>
