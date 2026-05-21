<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
class CrudsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cruds = Crud::all();
        return view('index', compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'first_name'=>'required',
        'last_name'=>'required',
        'gender'=>'required',
        'qualifications'=>'required'
        ]);
        $crud = new Crud;
        $crud->first_name = $request->input('first_name');
        $crud->last_name = $request->input('last_name');
        $crud->gender = $request->input('gender');
        $crud->qualifications = $request->input('qualifications');
        $crud->save();
        return redirect()->route('users.index');
    } 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $crud = Crud::find($id);
        return view('show', compact('crud'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $crud = Crud::find($id);
        return view('edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'gender'=>'required',
            'qualifications'=>'required'
        ]);
        $crud = Crud::find($id);
        $crud->first_name = $request->input('first_name');
        $crud->last_name = $request->input('last_name');
        $crud->gender = $request->input('gender');
        $crud->qualifications = $request->input('qualifications');
        $crud->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $crud = crud::findOrFail($id);
        $crud->delete();
    return redirect()->route('users.index')->with('success', 'Record deleted successfully.');
    }
}