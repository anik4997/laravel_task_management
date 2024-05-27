<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function create()
    {
        return view('create_task');
    }

    public function view()
    {
        $incompleteTasks = DB::table('tasks')->where('is_completed', false)->get();
        $completedTasks = DB::table('tasks')->where('is_completed', true)->get();
        return view('view_task', compact('incompleteTasks', 'completedTasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('tasks')->insert($data);

        return redirect()->route('task.view')->with('success', 'Task added successfully');
    }

    public function complete($id)
    {
        DB::table('tasks')->where('id', $id)->update(['is_completed' => true]);

        return redirect()->route('task.view')->with('success', 'Task marked as complete');
    }

    public function incomplete($id)
    {
        DB::table('tasks')->where('id', $id)->update(['is_completed' => false]);

        return redirect()->route('task.view')->with('success', 'Task marked as incomplete');
    }

    public function destroy($id)
    {
        DB::table('tasks')->where('id', $id)->delete();

        return redirect()->route('task.view')->with('success', 'Task deleted successfully');
    }

    public function edit($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();

        return view('edit_task', ['task' => $task]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => now(),
        ];

        DB::table('tasks')->where('id', $id)->update($data);

        return redirect()->route('task.view')->with('success', 'Task updated successfully');
    }
}
