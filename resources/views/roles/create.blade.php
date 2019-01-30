@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add a Role</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('role.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Role Title</label>

                            <div class="col-md-6">
                                <input id="title" type="title" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel panel-default text-center"> 
                <div class="panel-heading"> 
                    <h2> All Roles </h2> 
                </div>

                @if(! empty($roles))
                    <div class="table-responsive">
                        <table class="table"> 
                            <thead> 
                                <tr>
                                    <th class="text-center">Title</th> 
                                    <th class="text-center">Created at</th>
                                </tr> 
                            </thead> 
                            <tbody> 
                                @foreach($roles as $role) 
                                    <tr> 
                                        <td>{{ $role->title }}</td> 
                                        <td>{{ $role->created_at }}</td> 
                                        <td></td>  
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
@endsection
