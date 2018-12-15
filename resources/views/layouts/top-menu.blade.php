
<?php
$url = "$_SERVER[REQUEST_URI]";
if($url != "/abiturient"){
?>

<div class="ui secondary pointing menu">

            @if(Sentinel::check())
        <div class="right menu">
                    <form action="/logout" method="post" id="logout-form">
                        {{ csrf_field() }}

                        <a href="#" class="item" onclick="document.getElementById('logout-form').submit()">Вийти </a>

                    </form>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" class="item"
                       aria-expanded="false">
                        {{Sentinel::getUser()->first_name}}<span class="caret"></span>
                    </a>


                        <li>
                            <a href="/earnings" class="item">Home</a>
                        </li>
                        <li>
                            <a class="item" href="/profile/{{
                    Sentinel::getUser()->first_name
                }}">Profile</a>
                        </li>
                </div>
            @else
        <?php
        $url = "$_SERVER[REQUEST_URI]";
        if($url == "/abiturient"){
        ?>

            <div class="right menu" style="background-color: #455A64">
                <a class="item" href="abiturient#news">Новини</a>
                <a class="item" href="abiturient#anketa">Анкета</a>
            </div>

        <?php
            }else{
            ?>

        <?php }?>
            @endif


    <a class="item">
        @if(Sentinel::check())
            Hello, {{Sentinel::getUser()->first_name}}
        @else
            </a>
    @endif

</div>
<?php }else{ ?>

<div class="ui secondary pointing menu" style="background-color: #455A64">

    @if(Sentinel::check())
        <div class="right menu">
            <form action="/logout" method="post" id="logout-form">
                {{ csrf_field() }}

                <a href="#" class="item" onclick="document.getElementById('logout-form').submit()">Вийти </a>

            </form>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" class="item"
               aria-expanded="false">
                {{Sentinel::getUser()->first_name}}<span class="caret"></span>
            </a>


            <li>
                <a href="/earnings" class="item">Home</a>
            </li>
            <li>
                <a class="item" href="/profile/{{
                    Sentinel::getUser()->first_name
                }}">Profile</a>
            </li>
        </div>
    @else
        <?php
        $url = "$_SERVER[REQUEST_URI]";
        if($url == "/abiturient"){
        ?>
        <div class="right menu" style="background-color: #455A64; -webkit-text-fill-color: #fff; font-size: large;">
            <a class="item" href="http://tneu.edu.ua/">ТНЕУ</a>
            <a class="item" href="http://ki.tneu.edu.ua/">Сайт кафедри КІ</a>
        </div>
        <?php
        }else{
            ?>

        <?php }?>
    @endif


    <a class="item">
        @if(Sentinel::check())
            Hello, {{Sentinel::getUser()->first_name}}
        @else
    </a>
    @endif

</div>

    <?php }?>




