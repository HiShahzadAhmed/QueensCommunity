<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class TeamController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:browse_teams']);
    }

    public function index()
    {
        $roles = Role::all();
        $users = User::whereHas('roles')->with('roles')->get();
        return view('admin.teams.teams', get_defined_vars());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required'
        ]);



        $input = $request->all();
        $input['password'] = Hash::make('12345678');

        $user = User::create($input);
        $user->assignRole($request->role);


        return redirect()->route('admin.teams.index')->with('message','Team member has been created.');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function remove($id)
    {
        User::find($id)->delete();
        return back()->with('message','Team member has been deleted.');
    }

}
