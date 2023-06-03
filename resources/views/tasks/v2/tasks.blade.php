@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="" style="background-color: rgb(255, 255, 255)">
                <div class="container py-5 h-100">
                    <div
                        class="row d-flex justify-content-center align-items-center h-100"
                    >
                    <br/>
                        <div class="col-md-12 col-xl-10">
                            <div class="card shadow-lg">
                                <div class="card-header p-3">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-0">
                                            <i
                                                class="fas fa-tasks me-2"
                                                aria-hidden="true"
                                            ></i
                                            >Task List
                                        </h5>
                                        <div
                                            class="btn-group btn-group-sm"
                                            role="group"
                                            aria-label="Basic outlined example"
                                        >

                                        <form style="display:inline" method="get" action="{{route('tasks.index')}}">
                                            @csrf
                                            <input type="hidden" name="method" value="delete">
                                            <button
                                                type="submmit"
                                                class="btn btn-sm btn-primary"
                                            >
                                                <i
                                                    class="fa-solid fa-arrows-rotate text-white px-2"
                                                ></i>
                                            </button>
                                        </form>


                                            
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="card-body"
                                    data-mdb-perfect-scrollbar="true"
                                    style="
                                        position: relative;
                                        height: 400px;
                                        overflow: auto;
                                    "
                                >
                                    <div class="d-flex justify-content-between">
                                        <p>
                                            <strong
                                                >Current Tasks ({{
                                                    count(
                                                        $tasks["notcompleted"]
                                                    )
                                                }})</strong
                                            >
                                        </p>
                                        <div
                                            class="btn-group btn-group-sm"
                                            role="group"
                                            aria-label="Basic outlined example"
                                        >
                                            

                                            <form style="display:inline" method="post" action="{{route('tasks.store')}}">
                                                @csrf
                                                <input type="hidden" name="method" value="completeAllTasks">
                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-success"
                                                >
                                                    <i
                                                        class="fa-solid fa-check-double text-white px-2"
                                                    ></i></button
                                                >
                                            </form>
                                            
                                            <form style="display:inline" method="post" action="{{route('tasks.store')}}">
                                                @csrf
                                                <input type="hidden" name="method" value="deleteAll">
                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-danger"
                                                >
                                                    <i
                                                        class="fa-solid fa-trash-can-arrow-up text-white px-2"
                                                    ></i>
                                                </button>
                                            </form>
                                            
                                            
                                            
                                        </div>
                                    </div>
                                    @if (count($tasks['notcompleted']) == 0)
                                    <p class="text-center">No items to show</p>
                                    @else
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Team Member</th>
                                                <th scope="col">Task</th>
                                                <th scope="col">Priority</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tasks['notcompleted'] as $task)
                                            <tr class="fw-normal">
                                                <th>
                                                    <img
                                                        src="{{ $task->avatar }}"
                                                        class="shadow-1-strong rounded-circle"
                                                        alt="img"
                                                        style="
                                                            width: 32px;
                                                            height: auto;
                                                            margin: 5px 0px;
                                                        "
                                                    /><span
                                                        class="ms-2"
                                                        >{{ $task->user->name }}</span
                                                    >
                                                </th>
                                                <td class="align-middle">
                                                    <span
                                                        >{{ $task->description }}</span
                                                    >
                                                </td>
                                                <td class="align-middle">
                                                    <h6 class="mb-0">
                                                        <small>
                                                      
                                                            @if ($task->priority->description == 'low')
                                                            <span class="badge bg-info">{{ $task->priority->description }}</span>
                                                            @endif 
                                                            @if ($task->priority->description == 'medium')
                                                            <span class="badge bg-warning">{{ $task->priority->description }}</span>
                                                            @endif 
                                                            @if ($task->priority->description == 'high')
                                                            <span class="badge bg-danger">{{ $task->priority->description }}</span>
                                                            @endif
                                                        </small>
                                                    </h6>
                                                </td>
                                                <td class="align-middle">
                                                    <form style="display:inline" method="post" action="{{route('tasks.store')}}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$task->id}}">
                                                        <input type="hidden" name="method" value="toggleStatus">
                                                        <a
                                                            type="submit"
                                                            data-mdb-toggle="tooltip"
                                                            title="Mark task as complete"
                                                            onclick="event.target.parentElement.parentElement.submit()"
                                                            ><i
                                                                class="me-3 fas fa-check text-success"
                                                                aria-hidden="true"
                                                            ></i>
                                                        </a>
                                                    </form>
                                                    <form style="display:inline" method="post" action="{{route('tasks.store')}}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$task->id}}">
                                                        <input type="hidden" name="method" value="delete">
                                                        <a
                                                            type="submit"
                                                            data-mdb-toggle="tooltip"
                                                            title="Delete current task"
                                                            onclick="event.target.parentElement.parentElement.submit()"
                                                            ><i
                                                                class="fas fa-trash-alt text-danger"
                                                                aria-hidden="true"
                                                            ></i>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif

                                    <div
                                        class="d-flex justify-content-between mt-4"
                                    >
                                        <p>
                                            <strong
                                                >Completed Tasks ({{
                                                    count($tasks["completed"])
                                                }})</strong
                                            >
                                        </p>
                                        <div
                                            class="btn-group btn-group-sm"
                                            role="group"
                                            aria-label="Basic outlined example"
                                        ></div>
                                    </div>
                                    @if (count($tasks['completed']) == 0)
                                    <p class="text-center">No items to show</p>
                                    @else
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Team Member</th>
                                                <th scope="col">Task</th>
                                                <th scope="col">Priority</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tasks['completed'] as $task)
                                            <tr class="fw-normal">
                                                <th>
                                                    <img
                                                        src="{{ $task->avatar }}"
                                                        class="shadow-1-strong rounded-circle"
                                                        alt="img"
                                                        style="
                                                            width: 32px;
                                                            height: auto;
                                                            margin: 5px 0px;
                                                        "
                                                    /><span
                                                        class="ms-2 text-decoration-line-through text-danger"
                                                        >{{ $task->user->name }}</span
                                                    >
                                                </th>
                                                <td
                                                    class="align-middle text-decoration-line-through text-danger"
                                                >
                                                    <span>{{ $task->description }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <h6 class="mb-0">
                                                        <small>
                                                            @if ($task->priority->description == 'low')
                                                            <span class="badge bg-info">{{ $task->priority->description }}</span>
                                                            @endif 
                                                            @if ($task->priority->description == 'medium')
                                                            <span class="badge bg-warning">{{ $task->priority->description }}</span>
                                                            @endif 
                                                            @if ($task->priority->description == 'high')
                                                            <span class="badge bg-danger">{{ $task->priority->description }}</span>
                                                            @endif
                                                        </small>
                                                    </h6>
                                                </td>
                                                <td class="align-middle">
                                                    <form style="display:inline" method="post" action="{{route('tasks.store')}}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$task->id}}">
                                                        <input type="hidden" name="method" value="toggleStatus">
                                                        <a
                                                            type="submit"
                                                            data-mdb-toggle="tooltip"
                                                            title="Restore current task"
                                                            onclick="event.target.parentElement.parentElement.submit()"
                                                            ><i
                                                                class="me-3 fas fa-ban text-warning"
                                                                aria-hidden="true"
                                                            ></i>
                                                        </a>
                                                    </form>
                                                    <form style="display:inline" method="post" action="{{route('tasks.store')}}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$task->id}}">
                                                        <input type="hidden" name="method" value="delete">
                                                        <a
                                                            type="submit"
                                                            data-mdb-toggle="tooltip"
                                                            title="Delete current task"
                                                            onclick="event.target.parentElement.parentElement.submit()"
                                                            ><i
                                                                class="fas fa-trash-alt text-danger"
                                                                aria-hidden="true"
                                                            ></i>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                                <div class="card-footer text-end p-3">
                                <form style="display:inline" method="post" action="{{route('tasks.store')}}">
                                    @csrf
                                    <input type="hidden" name="method" value="addTask">
                                    <input type="hidden" name="avatar" value="" id="addAvatar" required>
                                    <input type="hidden" name="user_id" value="" id="addUserId" required>
                                    <input type="hidden" name="priority_id" value="" id="addPriority" required>
                                    
                                        <div class="input-group mb-3">
                                            <button
                                                class="btn btn-info dropdown-toggle"
                                                type="button"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                                id="btn-priority"
                                            >
                                                Priority
                                            </button>
                                            <ul class="dropdown-menu">
                                                @foreach ($tasks['priorities'] as $priority)
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        onclick="document.getElementById('btn-priority').innerText='{{ $priority->description }}'; document.getElementById('addPriority').value='{{ $priority->id }}'; "
                                                        >{{ $priority->description }}</a
                                                    >
                                                </li>
                                                @endforeach
                                                
                                            </ul>
                                            <button
                                                class="btn btn-warning dropdown-toggle"
                                                type="button"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                                id="btn-user"
                                            >
                                                User
                                            </button>
                                            <ul class="dropdown-menu">
                                                @foreach ($tasks['users'] as $user)
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        onclick="document.getElementById('btn-user').innerText='{{ $user->name }}'; document.getElementById('addUserId').value='{{ $user->id }}'; "
                                                        >{{ $user->name }}</a
                                                    >
                                                </li>
                                                @endforeach
                                                
                                            </ul>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Add a new task item ..."
                                                value=""
                                                name="description"
                                                required
                                            /><button class="btn btn-danger" type="submit">
                                                Add Task
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
