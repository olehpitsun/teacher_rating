{{Session::get('message') }}
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Edit participant</h1>
            </div>
            <div class="panel-body">
                <form action="/manageparticipants/{{$participant->id}}" method="POST">

                    {{ method_field('PUT')}}
                    {{ csrf_field() }}

                    <input type="hidden" name="user_id" value="{{Sentinel::getUser()->first()->id}}">
                    <div class="form-group">
                        <label for="content">surname</label>
                        <input type="text" name="surname" class="form-control" value="{{$participant->surname}}" >

                        </input>
                    </div>

                    <div class="form-group">
                        <label for="content">name</label>
                        <input type="text" name="name" class="form-control" value="{{$participant->name}}">
                        </input>
                    </div>

                    <div class="form-group">
                        <label for="content">fathername</label>
                        <input type="text" name="fathername" class="form-control" value="{{$participant->fathername}}">

                        </input>
                    </div>

                    <div class="form-group">
                        <label for="content">fathername</label>
                        <input type="text" name="fathername" class="form-control" value="{{$participant->fathername}}">
                        </input>
                    </div>

                    <div class="form-group">
                        <label for="content">degree</label>
                        <input type="text" name="degree" class="form-control" value="{{$participant->degree}}">
                        </input>
                    </div>

                    <div class="form-group">
                        <label for="content">status</label>
                        <input type="text" name="status" class="form-control" value="{{$participant->status}}">

                        </input>
                    </div>

                    <div class="form-group">
                        <label for="content">scholar_href</label>
                        <input type="text" name="scholar_href" class="form-control" value="{{$participant->scholar_href}}">

                        </input>
                    </div>

                    <div class="form-group">
                        <label for="content">position</label>
                        <input type="text" name="position" class="form-control" value="{{$participant->position}}">

                        </input>
                    </div>

                    <div class="form-group">
                        <label for="content">img</label>
                        <input type="text" name="img" class="form-control" value="{{$participant->img}}">

                        </input>
                    </div>

                    <div class="form-group">
                        <label for="content">mail</label>
                        <input type="text" name="mail" class="form-control" value="{{$participant->mail}}">
                        </input>
                    </div>

                    <div class="form-group">
                        <label for="content">en_surname</label>
                        <input type="text" name="en_surname" class="form-control" value="{{$participant->en_surname}}">

                        </input>
                    </div>

                    <div class="form-group">
                        <label for="content">en_name</label>
                        <input type="text" name="en_name" class="form-control" value="{{$participant->en_name}}">

                        </input>
                    </div>

                    <div class="form-group">
                        <label for="content">en_fathername</label>
                        <input type="text" name="en_fathername" class="form-control" value="{{$participant->en_fathername}}">

                        </input>
                    </div>

                    <div class="form-group">
                        <label for="content">en_degree</label>
                        <input type="text" name="en_degree" class="form-control" value="{{$participant->en_degree}}">

                        </input>
                    </div>

                    <div class="form-group">
                        <label for="content">en_status</label>
                        <input type="text" name="en_status" class="form-control" value="{{$participant->en_status}}">

                        </input>
                    </div>

                    <input type="submit" class="btn btn-success">
                </form>

            </div>
        </div>
    </div>
@endsection
