@php
    $data = isset($task) ? $task : '';
    $id = isset($data->id) && $data->id != '' ? $data->id : '';
    $title = isset($data->title) && $data->title != '' ? $data->title : '';
    $description = isset($data->description) && $data->description != '' ? $data->description : '';
    $due_date = isset($data->due_date) && $data->due_date != '' ? $data->due_date : '';
    $status = isset($data->status) && $data->status != '' ? $data->status : '';
@endphp
<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">{{ $id ? 'Edit Task' : 'Create Task' }}</h5>
                            <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">Back to Task List</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ $id ? route('task_update', $id) : route('task_store') }}">
                                @csrf
                                <!-- Task Title -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ $title }}" class="form-control" id="title" placeholder="Enter task title" required>
                                </div>

                                <!-- Task Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description"  class="form-control" id="description" rows="4" placeholder="Enter task description">{{ $description }}</textarea>
                                </div>

                                <!-- Task Status -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="Pending" {{ $status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="In Progress" {{ $status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="Completed" {{ $status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>

                                <!-- Due Date -->
                                <div class="mb-3">
                                    <label for="due_date" class="form-label">Due Date</label>
                                    <input type="date" name="due_date" value="{{ $due_date }}" class="form-control" id="due_date">
                                </div>

                                <!-- Submit Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary"> {{ $id ? 'Update Task' : 'Create Task' }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

