<?php

namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\Role;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $userData = User::select(['id', 'name', 'email'])->orderBy('id','desc');;
            return Datatables::of($userData)->make(true);
        }

        return view('displaydata');
    }


    public function create()
    {
        return view('users.forms');
    }
    public function createNote(Project $project)
{
    return view('users.createnotes', compact('project'));
}
public function storeNote(Request $request, Project $project)
{
    $request->validate([
        'content' => 'required',
    ]);

    Note::create([
        'project_id' => $project->id,
        'user_id' => auth()->user()->id,
        'content' => $request->input('content'),
    ]);

    return redirect('user/task-board')->with('success', 'Task Note added successfully.');
}

     public function taskboard(Request $request)
    {
        if ($request->ajax()) {
            $projects = Project::select([
                'projects.id',
                'projects.title',
                'projects.description',
                'projects.due_date',
                'templates.title as template_title',
                'users.name as user_name',
                DB::raw('(SELECT COUNT(*) FROM notes WHERE notes.project_id = projects.id) as note_count'),
                DB::raw('CASE WHEN projects.userstatus = 1 THEN "Completed" ELSE "Pending" END as project_status')
            ])
            ->leftJoin('templates', 'projects.template_id', '=', 'templates.id')
            ->leftJoin('users', 'projects.assigned_user_id', '=', 'users.id')
            ->where('projects.assigned_user_id', auth()->user()->id)
            ->orderBy('projects.id', 'desc');

            return Datatables::of($projects)->make(true);
        }
        return view('displaydata');
    }
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        // Create a new user
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
        ]);
        $userRole = Role::where('name', $request->role)->first();
        $user->roles()->attach($userRole);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        $userWithRole = $user->roles->pluck('name')->first();
                return view('users.edit', compact('user', 'userWithRole'));
    }

    public function update(Request $request, User $user)
    {
        // Validate the input
        $request->validate([

            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
        ]);

        // Update the user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);
        if($request->role=='admin'){
        $user->roles()->sync([1]);
        }else{
        $user->roles()->sync([2]);
         }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
    public function markUserProjectStatusComplete(Project $project)
{
    $project->update([
        'userstatus' => 1,
    ]);

    return redirect('user/task-board')->with('success', 'Project status successfully marked as complete.');
}
public function viewTaskNotes($id)
{
    $notes = Note::where('project_id', $id)->get();

    // Assuming each note belongs to a project and a user
    $project = $notes->first()->project; // Assuming 'project' is the relationship method in the Note model
    $user = $notes->first()->user;       // Assuming 'user' is the relationship method in the Note model

    return view('users.view_notes', compact('notes', 'project', 'user'));
}


}
