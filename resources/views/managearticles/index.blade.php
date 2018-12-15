{{Session::get('message') }}
@extends('layouts.master')

@section('content')
    <h2 class="row">
        <a href="/managearticles/create" class="btn btn-info" role="button">Додати</a>

            <h2 style="text-align: center">Список публікацій</h2>
        <table class="ui striped table">
            <thead>
            <tr>
                <th>id</th>
                <th>Назва</th>
                <th>Посилання</th>
                <th>created_at</th>
                <th>manage</th>
            </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td>{{$article->text}}</td>
                        <td>{{$article->href}}</td>
                        <td>{{$article->created_at}}</td>

                        <td>
                            <a href="/managearticles/{{$article->id}}/edit" class="ui yellow button">Edit</a>
                            <form action="/managearticles/{{$article->id}}" method="POST" class="pull-right" style="margin-left: 25px">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="ui red button">
                                    Delete
                                </button>
                            </form>
                        </td>

                    </tr>
                @empty
                    No articles
                @endforelse
                
                </tbody>
            </table>

    </div>
@endsection
