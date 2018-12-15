{{Session::get('message') }}

@extends('layouts.master')

@section('content')


    <link rel="stylesheet" type="text/css" href="./css/menu.css ">

    <link rel="stylesheet" type="text/css" href="./css/users.css">
    <link rel="stylesheet" type="text/css" href="./css/articles.css">



    <div class="container" style="height: 500px;background-color: #596778;background: url(/images/MyCollages.jpg);background-repeat: no-repeat;background-position: center; background-size: 1450px ">

        <div class="menu1" style="padding-top: 2%; padding-bottom: 1%">
            <h2>TNEU Computer Vision & Artificial Intelligence Scientific Group</h2>

            <nav class="menu">
                <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
                <label class="menu-open-button" for="menu-open">
                    <span class="lines line-1"></span>
                    <span class="lines line-2"></span>
                    <span class="lines line-3"></span>
                </label>

                <a href="#news" class="menu-item blue"> <img src="/images/icons/news_new.svg" alt="publications" /> </a>
                <a href="#search" class="menu-item green"> <img src="/images/icons/search.svg" alt="search publication" /> </a>
                <a href="#HIAMS" class="menu-item red"> <img src="/images/icons/window.svg" alt="HIAMS" />  </a>
                <a href="#top-publication" class="menu-item purple"> <img src="/images/icons/newarticles.png " alt="New publications" /> </a>
                <a href="#users" class="menu-item orange"> <img src="/images/icons/team.svg" alt="Team" /> </a>
                <a href="#contact" class="menu-item lightblue"> <img src="/images/icons/facebook.svg" alt="facebook" /> </a>
            </nav>
        </div>
    </div>
    <div class="content" style="-webkit-text-fill-color: #455A64; text-align: center">
        <h2>Наукова група займається дослідженнями в області комп'ютерного зору та штучного інтелекту на базі
            кафедри комп'ютерної інженерії ТНЕУ
        </h2>
    </div>
    <section id="search">

    <div class="container" style="text-align: center; padding: 1%;">
        <h2 class="ui header">
            <img class="ui image" src="/images/icons/search_file-512.png ">
            <div class="content">
                Пошук публікацій
            </div>
        </h2>
    </div>

    <div class="ui three column middle aligned very relaxed stackable grid">
        <div class="column">

            <div class="container" style="text-align: center">
                <div class="ui fluid category search">
                    <div class="ui icon input">
                        <input class="prompt" type="text" @keyup="search()" placeholder="What are you looking for?" class="form-control" v-model="query">
                        <i class="search icon"></i>
                    </div>
                </div>
            </div>



            <div class="alert alert-danger" role="alert" v-if="error">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                @{{error}}
            </div>

        </div>


        <div class="column">
            <div class="default text">Автори</div>
            <div class="styled-select slate">

                <select v-on:click="search()" v-model="query">
                    <option disabled value="Автори">Автори</option>
                    <option>Березький</option>
                    <option>Дубчак</option>
                    <option>Мельник</option>
                    <option>Батько</option>
                    <option>Піцун</option>
                    <option>Вербовий</option>
                    <option>Ігнатєв</option>
                    <option>Лящинський</option>
                </select>
            </div>

        </div>
        <div class="column">




            <div class="default text">Рік</div>
            <div class="styled-select slate">
                <select v-on:click="search()" v-model="query">
                    <option disabled value="Рік">Рік</option>
                    <option>2016</option>
                    <option>2017</option>
                    <option>2018</option>
                </select>
            </div>

        </div>
    </div>


    <div class="ui relaxed divided list" style="margin: 5%">
            <div class="item" v-for="article in articles">
                <i class=""><img src="" height="22px"></i>
                <div class="content">
                    <a class="header" href="" >@{{article.text}}</a>
                    <div class="description">@{{article.created_at}}</div>
                </div>
            </div>
    </div>
</section>


    <section id="HIAMS"  >
        <div class="ui massive horizontal divided list">

            @forelse($scholars as $scholar)
                <div class="item">
                    <div class="content">
                        <div class="header">{{$scholar["name"]}}</div>

                    </div>
                </div>

            @empty
                No news
            @endforelse
        </div>
    </section>

    <section id="HIAMS"  >
        <div class="ui massive horizontal divided list">

            @forelse($articles as $article)
            <div class="item">
                <img class="ui avatar image" src="/images/icons/{{$article->image}}">
                <div class="content">
                    <div class="header">{{$article->surname}} {{$article->name}} {{$article->fathername}}</div>
                    {{$article->scholar}}
                </div>
            </div>

            @empty
                No news
            @endforelse
        </div>
    </section>






    <section id="news">
    <div class="container" style="text-align: center; background-color: #FDD835; padding: 1% ">
        <h2 class="ui header">
            <img class="ui image" src="/images/icons/setting%20sign.svg_0.png ">
            <div class="content">
                Статті
            </div>
        </h2>
    </div>


        <div class="ui stackable grid" style="background-color: #FDD835">

            @forelse($news as $n)
                <div class="five wide column" style="padding-left: 2%">
                    <div class="single-article">
                        <div class="article-img">
                            <a href="/{{$n->href}}"><img src="images/articles/{{$n->img}}" width="100%" height="250px" alt="{{$n->title}}"></a>
                            <div class="article-content">
                                <div class="article-left">
                                    <?php $ym = explode('-', $n->created_at);
                                    $day = explode(" ", $ym[2]);
                                    ?>
                                    <h3><a href=""><?php echo $day[0] . " "; ?><?php echo $ym[1] ; ?><br><?php echo $ym[0]; ?></a></h3>
                                </div>
                                <div class="article-right">
                                    <p><a href="/{{$n->href}}">{{$n->title}}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                No news
            @endforelse
        </div>



</section>



































<section id="top-publication" >
    <div class="container" style="text-align: center; background-color: #E0E0E0; padding: 1%">
        <h2 class="ui header">
            <img class="ui image" src="/images/icons/Optimax-Icons-Technical-Articles.png ">
            <div class="content">
                Top публікації
            </div>
        </h2>
    </div>




    <div class="ui relaxed divided list" style="padding: 5%; background-color: #E0E0E0">

        @forelse($articles as $article)

            <div class="item">
                <i class=""><img src="images/icons/{{$article->image}}" height="22px"></i>
                <div class="content">
                    <a class="header" href="{{$article->href}}">{{$article->text}}</a>
                    <div class="description">{{$article->created_at}}</div>
                </div>
            </div>

        @empty
            No news
        @endforelse


    </div>
</section>



    <section id="users">

        <div class="container" style="text-align: center; background-color: #fff; padding: 1%">
            <h2 class="ui header">
                <img class="ui image" src="/images/icons/users.png ">
                <div class="content">
                    Учасники
                </div>
            </h2>
        </div>

            <div class="ui stackable grid">

                <div class="four wide column">
                    <div class="single-mentor" style="text-align: center">
                        <div class="mentor-img">
                            <a href=""><img src="images/participants/03.jpg" height="300px" width="210px"  alt="member"></a>
                            <div class="mentor-hover">
                                <h5>Березький Олег Миколайович</h5>
                                <h6>д.т.н., проф., зав. кафедри КІ</h6>
                                <ul>
                                    <li>ob@tneu.edu.ua</li>
                                    <li><a href="https://www.researchgate.net/profile/Oleh_Berezsky"><img src="images/icons/researchgate.png"></a></li>
                                    <li><a href="https://scholar.google.com.ua/citations?user=emSVZlwAAAAJ&hl=uk"><img src="images/icons/scholar.png"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="four wide column">
                    <div class="single-mentor" style="text-align: center">
                        <div class="mentor-img">
                            <a href=""><img src="images/participants/06.jpg" height="300px" width="210px"  alt="member"></a>
                            <div class="mentor-hover">
                                <h5>Мельник Григорій Миколайович</h5>
                                <h6></h6>
                                <ul>
                                    <li>mgm@tneu.edu.ua</li>
                                    <li><a href="https://www.researchgate.net/profile/Grygoriy_Melnyk"><img src="images/icons/researchgate.png"></a></li>
                                    <li><a href="https://scholar.google.com.ua/citations?user=GmIyuE4AAAAJ&hl=uk"> <img src="images/icons/scholar.png"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="four wide column">
                    <div class="single-mentor" style="text-align: center">
                        <div class="mentor-img">
                            <a href=""><img src="images/participants/04.jpg" height="300px" width="210px"  alt="member"></a>
                            <div class="mentor-hover">
                                <h5>Дубчак Леся Орестівна</h5>
                                <h6></h6>
                                <ul>
                                    <li>dlo@tneu.edu.ua</li>
                                    <li><a href="https://www.researchgate.net/profile/Lesia_Dubchak"><img src="images/icons/researchgate.png"></a></li>
                                    <li><a href="https://scholar.google.com.ua/citations?user=K_49PngAAAAJ&hl=uk"> <img src="images/icons/scholar.png"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="four wide column">
                    <div class="single-mentor" style="text-align: center">
                        <div class="mentor-img">
                            <a href=""><img src="images/participants/01.jpg" height="300px" width="210px"  alt="member"></a>
                            <div class="mentor-hover">
                                <h5>Піцун Олег Йосипович</h5>
                                <h6></h6>
                                <ul>
                                    <li>o.pitsun@tneu.edu.ua</li>
                                    <li><a href="https://github.com/olehpitsun"><img src="images/icons/github.png"></a></li>
                                    <li><a href="https://www.researchgate.net/profile/Oleg_Picun"><img src="images/icons/researchgate.png"></a></li>
                                    <li><a href="https://scholar.google.com.ua/citations?user=szP0KhEAAAAJ&hl=uk"> <img src="images/icons/scholar.png"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="four wide column">
                    <div class="single-mentor" style="text-align: center">
                        <div class="mentor-img">
                            <a href=""><img src="images/participants/07.jpg" height="300px" width="210px"  alt="member"></a>
                            <div class="mentor-hover">
                                <h5>Вербовий Сергій Олегович</h5>
                                <h6></h6>
                                <ul>
                                    <li>vso@tneu.edu.ua</li>
                                    <li><a href="https://www.researchgate.net/profile/Serhiy_Verbovyy"><img src="images/icons/researchgate.png"></a></li>
                                    <li><a href="https://scholar.google.com.ua/citations?user=Ly8HKtwAAAAJ&hl=uk"> <img src="images/icons/scholar.png"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="four wide column">
                    <div class="single-mentor" style="text-align: center">
                        <div class="mentor-img">
                            <a href=""><img src="images/participants/05.jpg" height="300px" width="210px"  alt="member"></a>
                            <div class="mentor-hover">
                                <h5>Ігнатєв Ігор Васильович</h5>
                                <h6></h6>
                                <ul>
                                    <li>
                                        <i class="mail icon"></i>
                                        <a class="detail">iiv@tneu.edu.ua</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="four wide column">
                    <div class="single-mentor" style="text-align: center">
                        <div class="mentor-img">
                            <a href=""><img src="images/participants/02.jpg" height="300px" width="210px"  alt="member"></a>
                            <div class="mentor-hover">
                                <h5>Лящинський Петро Борисович</h5>
                                <h6></h6>
                                <ul>
                                    <li>p.liashchynskyi@gmail.com</li>
                                    <li><a href="https://github.com/liashchynskyi"><img src="images/icons/github.png"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="four wide column">
                    <div class="single-mentor" style="text-align: center">
                        <div class="mentor-img">
                            <a href=""><img src="images/participants/08.jpg" height="300px" width="210px"  alt="member"></a>
                            <div class="mentor-hover">
                                <h5>Лящинський Павло Борисович</h5>
                                <h6></h6>
                                <ul>
                                    <li>pavloksmfcit@gmail.com</li>
                                    <li><a href="https://github.com/pavlo-programmer"><img src="images/icons/github.png"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>








<section id="contact">
    <div class="container" style="text-align: center; background-color: #fff; padding-top: 1% ">
        <h2 class="ui header">
            <div class="content">
                Зворотній зв'язок
            </div>
        </h2>
    </div>
    <div class="ui two column middle aligned very relaxed stackable grid">


        <div class="center aligned column" >
            <div class="ui form" style="padding-left: 5%">



                <form action="#" @submit.prevent="AddNewFeedback" method="POST">
                    <input type="hidden" value="{{ url('/') }}" v-model="baseUrl" />

                    {{ csrf_field() }}



                    <div class="field">
                        <label>Email</label>
                        <div class="ui left icon input">
                            <input v-model="feedbackUser.email" type="text" name="email" class="form-control" placeholder="email"
                                   required>
                            <i class="user icon"></i>
                        </div>
                    </div>




                    <div class="field">
                        <label>ім'я (Name)</label>

                        <input v-model="feedbackUser.name" type="text" name="name" class="form-control" placeholder="name"
                               required>
                    </div>
                    <div class="field">
                        <label>Текст (text)</label>

                        <textarea v-model="feedbackUser.text" type="text" name="text" class="form-control" placeholder="text"
                                  required></textarea>
                    </div>


                    <div class="form-group">
                        <button :disabled="!isValid" class="ui primary button" type="submit" v-if="!edit">Відправити</button>

                    </div>
                </form>


            </div>
            <div class="ui green labels" transition="success" v-if="success">
                <a class="ui label">Дані успішно відправлено. Дякуємо ! </a></div>
        </div>
        <div class="ui vertical divider">
            Or
        </div>
        <div class="center aligned column">
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v2.12&appId=279243079229003&autoLogAppEvents=1';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>


            <div class="fb-page" data-href="https://www.facebook.com/&#x41a;&#x430;&#x444;&#x435;&#x434;&#x440;&#x430;-&#x41a;&#x43e;&#x43c;&#x43f;&#x44e;&#x442;&#x435;&#x440;&#x43d;&#x43e;&#x457;-&#x406;&#x43d;&#x436;&#x435;&#x43d;&#x435;&#x440;&#x456;&#x457;-&#x422;&#x41d;&#x415;&#x423;-505980492901088/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/&#x41a;&#x430;&#x444;&#x435;&#x434;&#x440;&#x430;-&#x41a;&#x43e;&#x43c;&#x43f;&#x44e;&#x442;&#x435;&#x440;&#x43d;&#x43e;&#x457;-&#x406;&#x43d;&#x436;&#x435;&#x43d;&#x435;&#x440;&#x456;&#x457;-&#x422;&#x41d;&#x415;&#x423;-505980492901088/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/&#x41a;&#x430;&#x444;&#x435;&#x434;&#x440;&#x430;-&#x41a;&#x43e;&#x43c;&#x43f;&#x44e;&#x442;&#x435;&#x440;&#x43d;&#x43e;&#x457;-&#x406;&#x43d;&#x436;&#x435;&#x43d;&#x435;&#x440;&#x456;&#x457;-&#x422;&#x41d;&#x415;&#x423;-505980492901088/">Кафедра Комп&#039;ютерної Інженерії ТНЕУ</a></blockquote></div>
        </div>
    </div>



        </div>


    </div>
</section>



@endsection
@push('scripts')
    <script src="/js/myapp.js"></script>

@endpush