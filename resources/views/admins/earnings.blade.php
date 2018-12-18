@extends('layouts.master')

@section('content')

<div ><h1>Адміністрування</h1></div>

<div class="ui stackable grid" style="padding-left: 10%">
    <a href="/manageteachers">
        <div class="four wide column">
            <div class="ui card">
                <div class="image" style="text-align: center">
                    <img src="/images/icons/article-marketing.png">
                </div>
                <div class="content">
                    <a class="header" style="text-align: center">Список викладачів</a>
                </div>
            </div>
        </div>
    </a>
</div>

<form action="/logout" method="post" id="logout-form">
    {{ csrf_field() }}

    <a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>

</form>