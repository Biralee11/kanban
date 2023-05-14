<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Project Details - Kanban Board</title>
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

                                            <h2 class="nk-block-title">Kanban board for the project: <strong>
                                                    {{ $projects->project_name }} </strong> </h1>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <ul class="d-flex">
                                                @if (auth()->user()->role_id == 4 or auth()->user()->role_id == 3)
                                                    <li>
                                                        <a href="#" class="btn btn-md d-md-none btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#createTicketModal">
                                                            <em class="icon ni ni-plus"></em><span>Create</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="btn btn-primary d-none d-md-inline-flex"
                                                            data-bs-toggle="modal" data-bs-target="#createTicketModal">
                                                            <em class="icon ni ni-plus"></em><span>Create Task</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="card nk-pricing-wrap">
                                        <p>{{ $projects->description }}</p>
                                        <div class="nk-pricing-body">
                                            <div class="row g-gs">
                                                <div class="col-lg-6 col-xxl-3">
                                                    <div class="card card-gutter-md nk-pricing-card h-100">
                                                        <div class="card-body">
                                                            <div class="nk-pricing-card-title mb-4">
                                                                <h4 class="title">Upcoming</h4>
                                                            </div>
                                                            {{-- task --}}
                                                            @if (!empty($tasks))
                                                                @foreach ($tasks as $item)
                                                                    @if ($item->status == '1')
                                                                        <div
                                                                            class="card card-gutter-md nk-pricing-card">
                                                                            <div style="padding: 10px">
                                                                                <h6>{{ $item->name }}</h6>
                                                                                <hr>
                                                                            <label for="">Priority:</label>
                                                                            <span>
                                                                                @if ($item->priority == 1)
                                                                                    <span class="text-secondary">Low</span>
                                                                                @elseif ($item->priority == 2)
                                                                                    <span class="text-primary">Medium</span>
                                                                                @elseif ($item->priority == 3)
                                                                                    <span class="text-warning">High</span>
                                                                                @elseif ($item->priority == 4)
                                                                                    <span class="text-danger">Urgent</span>
                                                                                @endif
                                                                            </span><hr>
                                                                            </div>
                                                                           
                                                                            <button class="btn btn-success btn-sm"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#taskDetail{{ $item->id }}">Task
                                                                                details</button>
                                                                        </div>
                                                                        <br><br>
                                                                    @endif
                                                                @endforeach
                                                            @endif

                                                            {{-- task end --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-xxl-3">
                                                    <div class="card card-gutter-md nk-pricing-card h-100">
                                                        <div class="card-body">
                                                            <div class="nk-pricing-card-title mb-4">
                                                                <h4 class="title">In progress</h4>
                                                            </div>
                                                            {{-- task --}}
                                                            @if (!empty($tasks))
                                                                @foreach ($tasks as $item)
                                                                    @if ($item->status == '2')
                                                                        <div
                                                                            class="card card-gutter-md nk-pricing-card">
                                                                            <div style="padding:10px">
                                                                                <h6>{{ $item->name }}</h6>
                                                                                <hr>
                                                                            <label for="">Priority:</label>
                                                                            <span>
                                                                                @if ($item->priority == 1)
                                                                                    <span class="text-secondary">Low</span>
                                                                                @elseif ($item->priority == 2)
                                                                                    <span class="text-primary">Medium</span>
                                                                                @elseif ($item->priority == 3)
                                                                                    <span class="text-warning">High</span>
                                                                                @elseif ($item->priority == 4)
                                                                                    <span class="text-danger">Urgent</span>
                                                                                @endif
                                                                            </span><hr>
                                                                            </div>
                                                                           
                                                                            <button class="btn btn-success btn-sm"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#taskDetail{{ $item->id }}">Task
                                                                                details</button>
                                                                        </div><br><br>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            {{-- task end --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-xxl-3">
                                                    <div class="card card-gutter-md nk-pricing-card h-100">
                                                        <div class="card-body">
                                                            <div class="nk-pricing-card-title mb-4">
                                                                <h4 class="title">Testing</h4>
                                                            </div>
                                                            {{-- task --}}
                                                            @if (!empty($tasks))
                                                                @foreach ($tasks as $item)
                                                                    @if ($item->status == '3')
                                                                        <div
                                                                            class="card card-gutter-md nk-pricing-card">
                                                                            <div style="padding:10px">
                                                                                <h6>{{ $item->name }}</h6>
                                                                                <hr>
                                                                            <label for="">Priority:</label>
                                                                            <span>
                                                                                @if ($item->priority == 1)
                                                                                    <span class="text-secondary">Low</span>
                                                                                @elseif ($item->priority == 2)
                                                                                    <span class="text-primary">Medium</span>
                                                                                @elseif ($item->priority == 3)
                                                                                    <span class="text-warning">High</span>
                                                                                @elseif ($item->priority == 4)
                                                                                    <span class="text-danger">Urgent</span>
                                                                                @endif
                                                                            </span><hr>
                                                                            </div>
                                                                           
                                                                            <button class="btn btn-success btn-sm"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#taskDetail{{ $item->id }}">Task
                                                                                details</button>
                                                                        </div><br><br>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            {{-- task end --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-xxl-3">
                                                    <div class="card card-gutter-md nk-pricing-card h-100">
                                                        <div class="card-body">
                                                            <div class="nk-pricing-card-title mb-4">
                                                                <h4 class="title">Completed</h4>
                                                            </div>
                                                            {{-- task --}}
                                                            @if (!empty($tasks))
                                                                @foreach ($tasks as $item)
                                                                    @if ($item->status == '4')
                                                                        <div
                                                                            class="card card-gutter-md nk-pricing-card">
                                                                            <div style="padding:10px">
                                                                                <h6>{{ $item->name }}</h6>
                                                                                <hr>
                                                                            <label for="">Priority:</label>
                                                                            <span>
                                                                                @if ($item->priority == 1)
                                                                                    <span class="text-secondary">Low</span>
                                                                                @elseif ($item->priority == 2)
                                                                                    <span class="text-primary">Medium</span>
                                                                                @elseif ($item->priority == 3)
                                                                                    <span class="text-warning">High</span>
                                                                                @elseif ($item->priority == 4)
                                                                                    <span class="text-danger">Urgent</span>
                                                                                @endif
                                                                            </span><hr>
                                                                            </div>
                                                                           
                                                                            <button class="btn btn-success btn-sm"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#taskDetail{{ $item->id }}">Task
                                                                                details</button>
                                                                        </div><br><br>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            {{-- task end --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                <h4 class="modal-title" id="createTicketModalLabel">Create a Project</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('taskcreate') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="form-group"><label class="form-label">Task title</label>
                                <div class="form-control-wrap">
                                    <input type="hidden" class="form-control" name="project_id"
                                        value="{{ $projects->project_id }}">
                                    <input type="text" class="form-control" name="task_name"
                                        placeholder="Task title">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"><label class="form-label">Status</label>
                                <div class="form-control-wrap">
                                    <select class="js-select" name="status" data-sort="false">
                                        <option value="">Select a status</option>
                                        <option value="1">Up coming</option>
                                        <option value="2">In progress</option>
                                        <option value="3">Testing</option>
                                        <option value="4">Completed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"><label class="form-label">Priority</label>
                                <div class="form-control-wrap">
                                    <select class="js-select" name="priority" data-sort="false">
                                        <option value="">Select a priority</option>
                                        <option value="1">Low</option>
                                        <option value="2">Medium</option>
                                        <option value="3">High</option>
                                        <option value="4">Urgent</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group"><label class="form-label">Assigned To</label>
                                <div class="form-control-wrap"><select class="js-select" name="user_id"
                                        data-sort="false">
                                        <option value="">Select a user</option>
                                        @if (!empty($users))
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        @endif
                                    </select></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group"><label class="form-label">Description</label>
                                <div class="form-control-wrap">
                                    <textarea name="description" class="form-control" id="" cols="30" rows="2"> </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="d-flex gap g-2">
                                <div class="gap-col">
                                    <button class="btn btn-primary" type="submit">Add Task</button>
                                </div>
                                <div class="gap-col">
                                    <button type="button" class="btn border-0"
                                        data-bs-dismiss="modal">Discard</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if (!empty($tasks))
    @foreach ($tasks as $item)
        <div class="modal fade" id="taskDetail{{ $item->id }}" tabindex="-1"
            aria-labelledby="createTicketModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="createTicketModalLabel">Task Details</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="">Task:</label>
                        <span>{{ $item->name }}</span>
                        <hr>
                        <label for="">Priority:</label>
                        <span>
                            @if ($item->priority == 1)
                                <span class="text-secondary">Low</span>
                            @elseif ($item->priority == 2)
                                <span class="text-primary">Medium</span>
                            @elseif ($item->priority == 3)
                                <span class="text-warning">High</span>
                            @elseif ($item->priority == 4)
                                <span class="text-danger">Urgent</span>
                            @endif
                        </span>
                        <hr>
                        <label for="">Description:</label>
                        <span>{{ $item->description }}</span>
                        <hr>

                        <form action="{{ route('changeTaskStatus') }}" method="POST">
                            @csrf
                            <div class="row g-3 form-group">
                                <div class="col-lg-12">
                                    <div class="form-group"><label class="form-label">Change Status</label>
                                        <div class="form-control-wrap">
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <select class="js-select" name="status" data-sort="false">
                                                <option value="">Select a status</option>
                                                <option value="1">Up coming</option>
                                                <option value="2">In progress</option>
                                                <option value="3">Testing</option>
                                                <option value="4">Completed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex gap g-2">
                                        <div class="gap-col"><button class="btn btn-primary btn-sm"
                                                type="submit">Change</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form><br>
                        <hr>

                        <label for="">Comment</label><br>
                        @if (!empty($comments))
                            @foreach ($comments as $comment)
                                @if ($comment->project_id == $projects->project_id and $comment->task_id == $item->id)
                                    <a href="delete-comment?id={{$comment->id}}" class="text-danger">delete</a>
                                    <div class="form-check" >  
                                        <input class="form-check-input" type="checkbox" value="" id="editCheckbox">  
                                        <label class="form-check-label" for="flexCheckDefault"> edit </label>
                                    </div>
                                    <p style="padding-left:10px;"><em>{{$comment->message}}</em></p>

                                    <form action="{{route('editComment')}}" method="POST" id="form-edit" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$comment->id}}">
                                        <div class="form-group"><label class="form-label">Comment</label>
                                            <div class="form-control-wrap">
                                                <textarea name="message" id="" class="form-control">{{$comment->message}}</textarea>
                                            </div>
                                        </div>
                                        <div class="gap-col">
                                            <button class="btn btn-primary btn-sm" type="submit">edit</button>
                                        </div>
                                    </form>
                                @endif
                            @endforeach    
                        @endif
                        <br>
                        <hr>
                        <br>
                        <form action="{{ route('addComment') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <input type="hidden" name="task_id" value="{{$item->id}}">
                                    <input type="hidden" name="project_id" value="{{$projects->project_id}}">
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                    <div class="form-group"><label class="form-label">Add comment</label>
                                        <div class="form-control-wrap">
                                            <textarea name="message" id="" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="d-flex gap g-2">
                                        <div class="gap-col">
                                            <button class="btn btn-primary btn-sm" type="submit">Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
<script src="../../assets/js/data-tables/data-tables.js"></script>
<script>
    // Get references to the checkbox and target element
    const checkbox = document.getElementById('editCheckbox');
    const targetElement = document.getElementById('form-edit');

    // Attach an event listener to the checkbox
    checkbox.addEventListener('change', function() {
      // Check if the checkbox is checked
      if (checkbox.checked) {
        // Display the target element
        targetElement.style.display = 'block';
      } else {
        // Hide the target element
        targetElement.style.display = 'none';
      }
    });
  </script>
</html>
