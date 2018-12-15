<h1>Hello</h1>

<p>
    Натисніть щоб активуввти акаунт

    <a href="{{env('APP_URL')}}/activate/{{$user->email}}/{{$code}}">
        activate accout
    </a>
</p>