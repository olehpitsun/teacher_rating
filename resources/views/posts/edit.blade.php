{{Session::get('message') }}
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Створити пост</h1>
            </div>
            <div class="panel-body">
                <form action="/posts/{{$posts->id}}" method="POST">

                    {{ method_field('PUT')}}
                    {{ csrf_field() }}

                    <input type="hidden" name="user_id" value="{{Sentinel::getUser()->first()->id}}">
                    <div class="form-group">
                        <label for="content"></label>
                        <textarea name="content" class="form-control">
                            {{$posts->content}}
                        </textarea>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="live" {{ $posts->live == 1 ? 'checked' : '' }}>
                            Live
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="post_on">Post on</label>
                        <input type="datetime-local" name="post_on" value="{{ $posts->post_on }}"  class="form-control">
                    </div>

                    <input type="submit" class="btn btn-success">
                </form>

            </div>
        </div>
    </div>
@endsection
