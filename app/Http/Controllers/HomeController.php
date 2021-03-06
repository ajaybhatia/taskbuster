<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all()->where('user_id', \Auth::user()->id);
        return view('home', ['tasks' => $tasks]);
    }

    /**
     * Delete a task
     */
    public function delete(Request $request, $task)
    {
        Task::destroy($task);
    }

    /**
     * Create a task
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tasks|max:255',
            'description' => 'required',
        ]);

        $user = \Auth::user();

        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->user_id = $user->id;
        $task->save();

        return redirect('/home');
    }

    /**
     * Edit a task
     */
    public function edit(Request $request, Task $task)
    {
        $task->name = $request->name;
        $task->description = $request->description;
        $task->save();

        return redirect('/home');
    }
}
