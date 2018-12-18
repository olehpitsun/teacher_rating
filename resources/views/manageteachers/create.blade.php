{{Session::get('message') }}
@extends('layouts.master')

@section('content')
    <div class="row" style="padding: 1%">
        <div class="ui big breadcrumb">
            <a href="/earnings" class="section">Home</a>
            <i class="right chevron icon divider"></i>
            <a href="/manageteachers" class="section">Список викладачів</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">Додати викладача </div>
        </div>

        <div class="panel panel-default">
            <div class="ui one column middle aligned very relaxed stackable grid" style="padding: 10%">
                <div class="column">
                    <label class="ui form">
                    <form action="/manageteachers" method="POST">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value="{{Sentinel::getUser()->first()->id}}">

                        <div class="form-group">
                            <label for="text">ПІБ</label>
                            <input type="text" name="fullname" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="text">Scholar url</label>
                            <input type="text" name="scholar_href" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="href">Scopus url</label>
                            <input type="text" name="scopus_href" class="form-control">
                        </div>

                        <input type="submit" class="ui primary button">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
