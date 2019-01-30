<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index() {
    	$filter = request()->input('role');
    	
    	if ($filter) {
    		return $this->getUsersByFilter($filter);
    	}

    	return view('staff.index', [
    		'users' => User::all(),
    		'roles' => Role::all()
    	]);
    }

    public function edit(User $user) {
    	return view('staff.edit', ['user' => $user, 'roles' => Role::all()]);
    }

    public function update(User $user) {
    	request()->validate([
    		'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role' => 'required|integer',
            'password' => 'required|string|min:6|confirmed',
    	]);

    	$user->update([
    		'firstname' => request('firstname'),
    		'lastname' => request('lastname'),
    		'email' => request('email'),
    		'role_id' => request('role'),
    		'password' => bcrypt(request('password'))
    	]);

    	return redirect('/staff/index')->with('status', 'User Information Updated');
    }

    public function destroy(User $user) {
    	$user->delete();
    	return redirect('/staff/index')->with('status', 'Staff Member Data Deleted.');
    }

    public function search() {
    	request()->validate([ 'query' => 'required|string|max:255' ]);

    	$user = new User;
    	$users = $user->findUser(request('query'));

    	return view('staff.index', [ 'roles' => Role::all(), 'users' => $users ]);
    }

    private function getUsersByFIlter($filter) {
    	$role = Role::where('title', $filter)->first();

		return view('staff.index', [
    		'users' => $role->staff,
    		'roles' => Role::all()
    	]);
    }
}
