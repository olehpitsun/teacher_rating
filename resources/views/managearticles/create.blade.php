{{Session::get('message') }}
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="panel panel-default">
            <H2>Створити публікацію</H2>
            <div class="ui one column middle aligned very relaxed stackable grid" style="padding: 10%">
                <div class="column">
                    <label class="ui form">
                <form action="/managearticles" method="POST">
                    {{ csrf_field() }}

                    <input type="hidden" name="user_id" value="{{Sentinel::getUser()->first()->id}}">

                    <div class="form-group">
                        <label for="text">Назва</label>
                        <input type="text" name="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="href">Посилання</label>
                        <input type="text" name="href" class="form-control">
                    </div>


                    <input type="submit" class="ui primary button">
                </form>
                </div>

            </div>
        </div>
    </div>
@endsection
