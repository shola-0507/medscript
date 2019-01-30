<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {

    	return view('roles.create', [
    		'roles' => Role::all()
    	]);
    }

    public function store() {

    	request()->validate([
    		'title' => 'required|string'
    	]);

    	$role = Role::create([
    		'title' => request('title')
    	]);

    	return back()->with('status', $role->title . ' has been added.');

    }
}
