{{Session::get('message') }}
@extends('layouts.master')

@section('content')
    <div class="row">
        <a href="/manageusers/create" class="btn btn-info" role="button">Додати</a>

        <div class="panel panel-default">
            <div class="panel-heading">Users List</div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>created_at</th>
                        <th>last_login</th>
                        <th>activation</th>
                        <th>manage</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->last_email}}</td>
                            <td>{{$user->location}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->last_login}}</td>
                            <td>{{$user->activations == 1 ? "Yes" : 'No'}}</td>
                            <td>
                                <a href="/manageusers/{{$user->id}}/edit">Edit</a>
                                <form action="/manageusers/{{$user->id}}" method="POST" class="pull-right" >
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @empty
                            No users
                        @endforelse
                    </tbody>
                </table>
            </div>
        <div class="col-md-4 col-md-offset-4">
            {{$users->links()}}
        </div>
    </div>
@endsection
