@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="" style="background-color: rgb(255, 255, 255)">
                <div class="container py-5 h-100">
                    <div
                        class="row d-flex justify-content-center align-items-center h-100"
                    >
                    {{ $tasks['notcompleted'] }}
                    <br/>
                    {{ $tasks['priorities'] }}
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
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-primary"
                                            >
                                                <i
                                                    class="fa-solid fa-arrows-rotate text-white px-2"
                                                ></i>
                                            </button>
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
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-success"
                                            >
                                                <i
                                                    class="fa-solid fa-check-double text-white px-2"
                                                ></i></button
                                            ><button
                                                type="button"
                                                class="btn btn-sm btn-danger"
                                            >
                                                <i
                                                    class="fa-solid fa-trash-can-arrow-up text-white px-2"
                                                ></i>
                                            </button>
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
                                                    <a
                                                        href="#!"
                                                        data-mdb-toggle="tooltip"
                                                        title="Mark task as complete"
                                                        ><i
                                                            class="me-3 fas fa-check text-success"
                                                            aria-hidden="true"
                                                        ></i></a
                                                    ><a
                                                        href="#!"
                                                        data-mdb-toggle="tooltip"
                                                        title="Delete current task"
                                                        ><i
                                                            class="fas fa-trash-alt text-danger"
                                                            aria-hidden="true"
                                                        ></i
                                                    ></a>
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
                                                        @if ($task->priority == 'low')
                                                            <span class="badge bg-info">{{ $task->priority }}</span>
                                                            @endif 
                                                            @if ($task->priority == 'medium')
                                                            <span class="badge bg-warning">{{ $task->priority }}</span>
                                                            @endif 
                                                            @if ($task->priority == 'high')
                                                            <span class="badge bg-danger">{{ $task->priority }}</span>
                                                            @endif
                                                        </small>
                                                    </h6>
                                                </td>
                                                <td class="align-middle">
                                                    <a
                                                        href="#!"
                                                        data-mdb-toggle="tooltip"
                                                        title="Restore current task"
                                                        ><i
                                                            class="me-3 fas fa-ban text-warning"
                                                            aria-hidden="true"
                                                        ></i></a
                                                    ><a
                                                        href="#!"
                                                        data-mdb-toggle="tooltip"
                                                        title="Delete current task"
                                                        ><i
                                                            class="fas fa-trash-alt text-danger"
                                                            aria-hidden="true"
                                                        ></i
                                                    ></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                                <div class="card-footer text-end p-3">
                                    <form>
                                        <div class="input-group mb-3">
                                            <button
                                                class="btn btn-info dropdown-toggle"
                                                type="button"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                Priority
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        >Action</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        >Another action</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        >Something else here</a
                                                    >
                                                </li>
                                                <li>
                                                    <hr
                                                        class="dropdown-divider"
                                                    />
                                                </li>
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        >Separated link</a
                                                    >
                                                </li>
                                            </ul>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Add a new task item ..."
                                                value=""
                                            /><button class="btn btn-danger">
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
