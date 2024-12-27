<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function list(Request $request)
    {
        // $data['task'] = Task::orderBy('id', 'desc')->get();

        $task = Task::where('user_id', Auth::id())->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })->when($request->sort_by, function ($query) use ($request) {
                $query->orderBy('due_date', $request->sort_by);
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('dashboard', compact('task'));
    }

    public function create()
    {
        return view('create_task');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'due_date' => 'nullable|date',
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;

        $task->status = $request->status ?? 'Pending';
        $task->user_id = Auth::user()->id;
        $task->save();

        if ($task) {
            return redirect()->route('dashboard')->with('success','Task added Successfully');
        } else {
            return redirect()->back()->with('error','Task added Failed');
        }
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('create_task', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;

        $task->status = $request->status ?? 'Pending';
        $task->user_id = Auth::user()->id;
        $task->update();

        if ($task) {
            return redirect()->route('dashboard')->with('success','Task updated Successfully');
        } else {
            return redirect()->back()->with('error','Task updated Failed');
        }
    }

    public function delete($id)
    {
        $task = Task::find($id)->delete();

        if ($task) {
            return redirect()->route('dashboard')->with('success','Task Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Task updated Failed');
        }

    }
}
