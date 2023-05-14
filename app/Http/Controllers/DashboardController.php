<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\{Project, Task, User, Comment};
use Illuminate\Support\Facades\DB;
use Mockery\Expectation;
use Symfony\Component\Console\Input\Input;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $i =1;
        $allUser = User::get();
        return view('dashboard', ['users' => $allUser, 'i' => $i]);
    }


    public function assignRole(Request $request)
    {
        $assign_role = User::find($request->id);
        $assign_role->role_id = $request->role;
        $assign_role->save();

        return redirect()->back()->with('success', 'Role successfully assigned');

    }

    public function project(Request $request)
    {
        $i =1;
        $projects = Project::get();
        return view('project', ['projects'=> $projects, 'i' => $i]);
    }

    public function projectCreate(Request $request)
    {
        $request->validate([
            'project_name' => 'required',
            'project_slug' => 'required',
            'description' => 'required',

           ]);
        try {
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
           $task_id =  rand(00000, 990999);
           $creat_task = new Task();
           $creat_task->task_id = $task_id;
           $creat_task->name = $request->task_name;
           $creat_task->user_id = $request->user_id;
           $creat_task->status = $request->status;
           $creat_task->priority = $request->priority;
           $creat_task->description = $request->description;
           $creat_task->project_id = $request->project_id;
           $creat_task->save();
           return redirect()->back()->with('success', 'Task successfully uploaded !');

        } catch (Exception $exception) {
            return back()->with('error', 'something is wrong'.$exception);
        }
    }

    public function changeTaskStatus(Request $request)
    {
        $task_id = $request->id;
        $Update = Task::find($task_id);
        $Update->status = $request->status;
        $Update->save();
        return redirect()->back()->with('success', 'Updat task successful');
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

    public function deleteUser(Request $request)
    {
        try {
            User::where('id', $request->id)->delete();
            return back()->with('success', 'User deleted successfully');
        } catch (Exception $exception) {
            return back()->with('error', 'something is wrong');
        }
    }

    public function projectDetail(Request $request)
    {
        try {
            $users =  User::where('role_id', '!=', '4')->get();
            $projects = Project::where('id', $request->id)->first();
            $tasks = Task::where('project_id', $projects->project_id)->get();
            $comment = Comment::where('project_id', $projects->project_id)->get();
            return view('project-details', ['projects'=>$projects, 'tasks' => $tasks, 'users' => $users, 'comments' => $comment]);

        } catch (Expectation $exception) {
            return back()->with('error', 'something is wrong'); 
        }
    }

    public function addComment(Request $request)
    {
        $addComment = new Comment();
        $addComment->task_id = $request->task_id;
        $addComment->user_id = $request->user_id;
        $addComment->project_id = $request->project_id;
        $addComment->message = $request->message;
        $addComment->save();

        return redirect()->back()->with('success', 'Comment successfully added');
    }

    public function deleteComment(Request $request)
    {
        try {
            Comment::where('id', $request->id)->delete();
            return back()->with('success', 'Comment deleted successfully');
        } catch (Exception $exception) {
            return back()->with('error', 'something is wrong');
        }
    }

    public function editComment(Request $request)
    {
        $id = $request->id;
        $Update = Comment::find($id);
        $Update->message = $request->message;
        $Update->save();
        return redirect()->back()->with('success', 'Comment successfully edited');
    }
}
