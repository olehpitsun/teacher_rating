{{Session::get('message') }}
@extends('layouts.master')

@section('content')
    <div class="row">
        <a href="/manageparticipants/create" class="btn btn-info" role="button">Додати</a>

        <div class="panel panel-default">
            <div class="panel-heading">Particicpants List</div>
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
                @forelse($participants as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->surname}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->fathername}}</td>
                        <td>{{$user->degree}}</td>
                        <td>{{$user->status}}</td>
                        <td>{{$user->scholar_href}}</td>

                        <td>{{$user->position}}</td>
                        <td>{{$user->img}}</td>
                        <td>{{$user->en_surname}}</td>
                        <td><a href="/manageparticipants/{{$user->id}}/edit">Edit</a>
                            <form action="/manageparticipants/{{$user->id}}" method="POST" class="pull-right" style="margin-left: 25px">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>

                    </tr>
                @empty
                    No participants
                @endforelse
                
                </tbody>
            </table>
        </div>

    </div>
@endsection
