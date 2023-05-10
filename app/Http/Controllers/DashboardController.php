<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\{Project, Task};
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard');
    }
    public function project(Request $request)
    {
        $i =1;
        $projects = Project::get();
        return view('project', ['projects'=> $projects, 'i' => $i]);
    }

    public function projectCreate(Request $request)
    {
        try {
           $request->validate([
            'project_name' => 'required',
            'project_slug' => 'required',
            'description' => 'required',

           ]);

           $project_id =  rand(00000, 990999);
           $creat_project = new Project();
           $creat_project->project_id = $project_id;
           $creat_project->project_name = $request->project_name;
           $creat_project->project_slug = $request->project_slug;
           $creat_project->description = $request->description;
           $creat_project->save();

           return redirect()->route('project')->with('success', 'Project successfully uploaded !');

        } catch (Exception $exception) {
            return back()->with('error', 'something is wrong');
        }
    }

    public function deleteProject(Request $request)
    {
        try {
            Project::where('id', $request->id)->delete();
            return back()->with('success', 'Project deleted successfully');
        } catch (Exception $exception) {
            return back()->with('error', 'something is wrong');
        }
    }


    public function task(Request $request)
    {
        $i =1;
        $tasks = Task::get();
        return view('task', ['tasks'=> $tasks, 'i' => $i]);
    }

    public function taskCreate(Request $request)
    {
        try {
           $request->validate([
            'project_name' => 'required',
            'project_slug' => 'required',
            'description' => 'required',

           ]);

           $task_id =  rand(00000, 990999);
           $creat_task = new Task();
           $creat_task->task_id = $task_id;
           $creat_task->task_name = $request->task_name;
           $creat_task->task_slug = $request->task_slug;
           $creat_task->description = $request->description;
           $creat_task->save();

           return redirect()->route('task')->with('success', 'Task successfully uploaded !');

        } catch (Exception $exception) {
            return back()->with('error', 'something is wrong');
        }
    }

    public function deleteTask(Request $request)
    {
        try {
            Task::where('id', $request->id)->delete();
            return back()->with('success', 'Task deleted successfully');
        } catch (Exception $exception) {
            return back()->with('error', 'something is wrong');
        }
    }

    public function projectDetail()
    {
        
    }
}
