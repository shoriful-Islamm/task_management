<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Create Task Button -->
                    @if (Session::has('error'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session::get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session::get('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <a href="{{ route('task_create') }}" class="btn btn-primary">Create Task</a>

                    <!-- Filter Form -->
                    <form method="GET" class="mt-3">
                        <div class="row g-2 align-items-center">
                            <!-- Status Filter -->
                            <div class="col-md-5">
                                <select name="status" class="form-select">
                                    <option value="">All Statuses</option>
                                    <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>

                            <!-- Sort Filter -->
                            <div class="col-md-5">
                                <select name="sort_by" class="form-select">
                                    <option value="">Sort by Due Date</option>
                                    <option value="asc" {{ request('sort_by') == 'asc' ? 'selected' : '' }}>Ascending</option>
                                    <option value="desc" {{ request('sort_by') == 'desc' ? 'selected' : '' }}>Descending</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-secondary w-100">Filter</button>
                            </div>
                        </div>
                    </form>


                    <!-- Task Table -->
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Due Date</th>
                                <th>description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($task->isNotEmpty())
                                @foreach ($task as $key => $data)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->due_date }}</td>
                                        <td>{{ isset($data->description) ? Illuminate\Support\Str::limit($data->description, 25, $end='...') : '' }}</td>
                                        <td>
                                            <a href="{{ route('task_edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('task_delete', $data->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">No tasks found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
