<div class="ui inverted menu">

    @if(Sentinel::check())
        <div class="right menu">
            <form action="/logout" method="post" id="logout-form">
                {{ csrf_field() }}
                <a href="#" class="active red item" onclick="document.getElementById('logout-form').submit()">Вийти </a>
            </form>
            <a href="/earnings" class="item">Home</a>
            <a class="item" href="/profile/{{
                    Sentinel::getUser()->first_name
                }}">Profile
            </a>
        </div>
    @endif

    <a class="active teal item">
        @if(Sentinel::check())
            Hello, {{Sentinel::getUser()->first_name}}
        @else
    </a>
    @endif
</div>

