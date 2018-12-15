{{Session::get('message') }}
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Edit participant</h1>
            </div>
            <div class="panel-body">
                <form action="/managenews/{{$news->id}}" method="POST">

                    {{ method_field('PUT')}}
                    {{ csrf_field() }}

                    <input type="hidden" name="user_id" value="{{Sentinel::getUser()->first()->id}}">
                    <div class="form-group">
                        <label for="content">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$news->title}}">
                    </div>

                    <div class="form-group">
                        <label for="content">text</label>
                        <input type="text" name="text" class="form-control" value="{{$news->text}}">
                    </div>

                    <div class="form-group">
                        <label for="content">en_text</label>
                        <input type="text" name="en_text" class="form-control" value="{{$news->en_text}}">
                    </div>

                    <div class="form-group">
                        <label for="content">img</label>
                        <input type="text" name="img" class="form-control" value="{{$news->img}}">
                    </div>

                    <div class="form-group">
                        <label for="content">href</label>
                        <input type="text" name="href" class="form-control" value="{{$news->href}}">
                    </div>

                    <input type="submit" class="btn btn-success">
                </form>

            </div>
        </div>
    </div>
@endsection
