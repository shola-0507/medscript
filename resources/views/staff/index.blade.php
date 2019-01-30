@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <a href="{{ route('staff.index') }}">All Users</a>
                    <div class="dropdown pull-right">
                        <a href="{{ route('staff.create') }}">+ Add Users</a>
                        <button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown">
                            Filter By Role
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu pull-right">
                            @foreach($roles as $role)
                                <li><a href="{{ $role->url() }}">All {{ $role->title }}s</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('staff.search') }}" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="query" placeholder="Search users"> 
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>

                    @if(!empty($users))
                        <div class="table-responsive">
                            <table class="table text-center"> 
                                <thead> 
                                    <tr>
                                        <th class="text-center">First Name</th> 
                                        <th class="text-center">Last Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Role</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    @foreach($users as $user) 
                                        <tr> 
                                            <td>{{ $user->firstname }}</td> 
                                            <td>{{ $user->lastname }}</td> 
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role->title }}</td>  
                                            <td><a href="{{ route('staff.edit', $user) }}"><button class="btn btn-primary">Edit User</button></a></td>
                                            <td><a href="{{ route('staff.delete', $user) }}"><button class="btn btn-danger">Delete</button></a></td>
                                        </tr> 
                                    @endforeach 
                                </tbody> 
                            </table> 
                        </div> 
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
