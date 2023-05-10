<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Task - Kanban</title>
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
                                            <h2 class="nk-block-title">Project List</h1>
                                                <nav>
                                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">
                                                            Projects
                                                            List</li>
                                                    </ol>
                                                </nav>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <ul class="d-flex">
                                                <li>
                                                    <a href="#" class="btn btn-md d-md-none btn-primary" data-bs-toggle="modal" data-bs-target="#createTicketModal">
                                                        <em class="icon ni ni-plus"></em><span>Create</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="btn btn-primary d-none d-md-inline-flex" data-bs-toggle="modal" data-bs-target="#createTicketModal">
                                                        <em class="icon ni ni-plus"></em><span>Create Task</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="card">
                                        <table class="datatable-init table" data-nk-container="table-responsive">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="tb-col"><span class="overline-title">S/N</span>

                                                    <th class="tb-col"><span class="overline-title">Project id</span>
                                                    </th>
                                                    <th class="tb-col"><span class="overline-title">Project name</span>
                                                    </th>
                                                    <th class="tb-col"><span class="overline-title">Project slug</span>
                                                    </th>
                                                    <th class="tb-col tb-col-xl"><span
                                                            class="overline-title">date</span></th>
                                                    {{-- <th class="tb-col tb-col-xxl"><span class="overline-title">Status</span></th> --}}
                                                    <th class="tb-col tb-col-end" data-sortable="false"><span
                                                            class="overline-title">Action</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($projects as $project)
                                                <tr>
                                                    <td class="tb-col tb-col-check"> <span> {{$i++}} </span> </td>
                                                    <td class="tb-col"><a
                                                            class="text-light">{{$project->project_id}}</a></td>
                                                    <td class="tb-col tb-col-xl"><span>{{$project->project_name}}</span></td>
                                                    <td class="tb-col tb-col-xl"><span>{{$project->project_slug}}</span></td>
                                                    <td class="tb-col tb-col-xl"><span>{{$project->created_at}}</span></td>
                                                    {{-- <td class="tb-col"><span class="badge text-bg-success-soft">Paid</span></td> --}}
                                                    <td class="tb-col tb-col-end">
                                                        <div class="d-flex justify-content-end gap g-2">
                                                            <div class="gap-col">
                                                                <a href="delete_project?id={{$project->id}}" class="btn btn-sm btn-lighter"> <em class="icon ni ni-delete"></em> </a>
                                                            </div>
                                                            <div class="gap-col">
                                                                <a href="invoice-preview.html" class="btn btn-sm btn-lighter"> <em class="icon ni ni-eye"></em> </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
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

{{-- <div class="modal fade" id="createTicketModal" tabindex="-1" aria-labelledby="createTicketModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createTicketModalLabel">Create a Project</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('task')}}" method="POST">
                    @csrf
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="form-group"><label class="form-label">Task title</label>
                                    <div class="form-control-wrap"><input type="text" class="form-control"
                                            placeholder="Task title"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group"><label class="form-label">Assigned To</label>
                                    <div class="form-control-wrap"><select class="js-select" data-sort="false">
                                            <option value="">Select a user</option>
                                            <option value="1">Alex Smith</option>
                                            <option value="2">Kevin Martin</option>
                                            <option value="3">Kamran Ahmed</option>
                                        </select></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group"><label class="form-label">Due Date</label>
                                    <div class="form-control-wrap"><input placeholder="dd/mm/yyyy" type="text"
                                            class="form-control js-datepicker" autocomplete="off" id="due-date"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group"><label class="form-label">Status</label>
                                    <div class="form-control-wrap"><select class="js-select" data-sort="false">
                                            <option value="">Select a status</option>
                                            <option value="1">New</option>
                                            <option value="2">Open</option>
                                            <option value="3">Pending</option>
                                            <option value="4">Closed</option>
                                        </select></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group"><label class="form-label">Priority</label>
                                    <div class="form-control-wrap"><select class="js-select" data-sort="false">
                                            <option value="">Select a priority</option>
                                            <option value="1">Medium</option>
                                            <option value="2">Low</option>
                                            <option value="3">High</option>
                                            <option value="4">Urgent</option>
                                        </select></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex gap g-2">
                                    <div class="gap-col"><button class="btn btn-primary" type="submit">Add Task</button>
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
</div> --}}

<script src="../../assets/js/data-tables/data-tables.js"></script>

</html>
