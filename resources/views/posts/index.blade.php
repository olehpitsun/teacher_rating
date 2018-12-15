{{Session::get('message') }}
@extends('layouts.master')

@section('content')
    <div class="row">
        <a href="/posts/create" class="btn btn-info" role="button">Додати</a>

        @forelse($posts as $post)

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>Перегляд постів</h5>

                <span class="pull-right">
                    {{$post->created_at  }}
                </span>
                </div>
                <div class="panel-body">

                    {{ $post->content }}
                    <div class="panel-footer" style="background-color: white">
                        <a href="/posts/{{$post->id}}/edit">Edit</a> |


                        @if($post->user_id == Sentinel::getUser()->first()->id)
                            <form action="/posts/{{$post->id}}" method="POST" class="pull-right" style="margin-left: 25px">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        @endif

                        <i class="fa fa-heart pull-right">
                        </i>
                    </div>

                </div>
            </div>

            @empty
                No posts
        @endforelse

        <div class="col-md-4 col-md-offset-4">
            {{$posts->links()}}
        </div>

    </div>
@endsection
