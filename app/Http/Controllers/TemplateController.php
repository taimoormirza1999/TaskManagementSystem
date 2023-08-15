<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TemplateController extends Controller
{


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Template::select(['id', 'title', 'description', 'due_date'])->orderBy('id','desc');
            return Datatables::of($data)->make(true);
        }

        return view('displaydata');
    }


    public function create()
{
    return view('templates.create');
}
public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'due_date' => 'required|date',
    ]);

    Template::create([
        'title' => $request->title,
        'description' => $request->description,
        'due_date' => $request->due_date,
    ]);

    return redirect()->route('templates.index')->with('success', 'Template created successfully.');
}
public function show(Template $template)

{
    
    return view('templates.edit', compact('template'));
}
public function update(Request $request, Template $template)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'due_date' => 'required|date',
    ]);

    $template->update([
        'title' => $request->title,
        'description' => $request->description,
        'due_date' => $request->due_date,
    ]);

    return redirect()->route('templates.index')->with('success', 'Template updated successfully.');
}
public function destroy(Template $template)
{
    $template->delete();
    return redirect()->route('templates.index')->with('success', 'Template deleted successfully.');
}

}
