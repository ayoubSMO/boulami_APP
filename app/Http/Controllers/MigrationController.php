<?php

// khasso itm7a 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Migration;

class MigrationController extends Controller
{
    public function index()
    {
        $migrations = Migration::all();

        return view('migrations.index', compact('migrations'));
    }

    public function create()
    {
        $migration = new Migration();
        return view('migrations.create', compact('migration'));
    }

    public function store()
    {
        $migrations = Migration::create($this->validateData());
        return redirect('/migrations/'.$migrations->id);
    }

    //Route Model Binding => \App\Customer $var
    public function show(Migration $migration)
    {
        return view('migrations.show', compact('migration'));
    }

    public function edit(Migration $migration)
    {
        return view('migrations.edit', compact('migration'));
    }

    public function update(Migration $migration)
    {
        $migration->update($this->validateData());    

        return redirect('/migrations/'.$migration->id);
    }

    public function destroy(Migration $migration)
    {
        $migration->delete();

        return redirect('/migrations');
    }


    public function validateData()
    {
        return request()->validate([
			'id' => '',

			'migration' => 'required|max:191|',

			'batch' => 'required|',
		]);
 }


    //----------------------------------------Rest Controllers----------------------
    
    public function restIndex($limit = 0)
    {
        return Migration::limit(99)->offset($limit)->get();
    }

    public function restStore()
    {
        return Migration::create($this->validateData());
    }

    //Route Model Binding => \App\Customer $var
    public function restShow(Migration $migration)
    {
        return $migration;
    }

    
    public function restUpdate(Migration $migration)
    {
        return $migration->update($this->validateData());
    }

    public function RestDestroy(Migration $migration)
    {
        return $migration->delete();
    }
}
        