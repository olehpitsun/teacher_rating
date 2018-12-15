{{Session::get('message') }}
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Edit</h1>
            </div>
            <div class="panel-body">
                <form action="/manageusers/{{$users[0]->id}}" method="POST">

                    {{ method_field('PUT')}}
                    {{ csrf_field() }}

                    <input type="hidden" name="user_id" value="{{$users[0]->id}}">
                    <input type="hidden" name="activation_id" value="{{$users[0]->activation_id}}">

                    <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                            <input type="text" name="first_name" class="form-control" value="{{$users[0]->first_name}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                            <input type="text" name="last_name" class="form-control" value="{{$users[0]->last_name}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </span>
                            <input type="text" name="location" class="form-control" value="{{$users[0]->location}}">
                        </div>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="completed" {{ $users[0]->completed == 1 ? 'checked' : '' }}>
                            activations
                        </label>
                    </div>

                    <input type="submit" class="btn btn-success">
                </form>

            </div>
        </div>
    </div>
@endsection
