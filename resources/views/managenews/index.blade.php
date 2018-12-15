{{Session::get('message') }}
@extends('layouts.master')

@section('content')
    <div class="row">
        <a href="/managenews/create" class="btn btn-info" role="button">Додати</a>

        <div class="panel panel-default">
            <div class="panel-heading">News List</div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Text</th>
                    <th>En_text</th>
                    <th>img</th>
                    <th>href</th>
                    <th>manage</th>
                </tr>
                </thead>
                <tbody>
                @forelse($news as $n)
                    <tr>
                        <td>{{$n->id}}</td>
                        <td>{{$n->title}}</td>
                        <td>{{$n->text}}</td>
                        <td>{{$n->en_text}}</td>
                        <td>{{$n->href}}</td>
                        <td>{{$n->img}}</td>

                        <td><a href="/managenews/{{$n->id}}/edit">Edit</a>
                            <form action="/managenews/{{$n->id}}" method="POST" class="pull-right" style="margin-left: 25px">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>

                    </tr>
                @empty
                    No news
                @endforelse
                
                </tbody>
            </table>
        </div>

    </div>
@endsection
