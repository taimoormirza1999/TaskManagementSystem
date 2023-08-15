<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Template;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $projects = Project::select(['projects.id', 'projects.title', 'projects.description', 'projects.due_date', 'templates.title as template_title', 'users.name as user_name'])
                ->leftJoin('templates', 'projects.template_id', '=', 'templates.id')
                ->leftJoin('users', 'projects.assigned_user_id', '=', 'users.id')
                ->orderBy('projects.id', 'desc');
            return Datatables::of($projects)->make(true);
        }
        return view('displaydata');
    }

    public function create()
    {
        $templates = Template::all();
        $users = User::all();
        return view('projects.create', compact('templates', 'users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'template_id' => 'required|exists:templates,id',
            'assigned_user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'template_id' => $request->template_id,
            'assigned_user_id' => $request->assigned_user_id,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project task created and assigned successfully.');
    }


    // Other CRUD methods

    public function show(Project $project)
    {

        $templates = Template::all();
        $users = User::all();
        return view('projects.edit', compact('project', 'templates', 'users'));
    }

    public function update(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'template_id' => 'required|exists:templates,id',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'template_id' => $request->template_id,
            'assigned_user_id' => $request->user_id,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project task updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project task deleted successfully.');
    }
   

}
