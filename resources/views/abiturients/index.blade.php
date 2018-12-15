{{Session::get('message') }}
<script src="https://unpkg.com/vue"></script>

@extends('layouts.master')

@section('content')


    <div class="container" style="text-align: center; background-color: #87b2bf;  padding-bottom: 1% ; -webkit-text-fill-color: #fff;
        font-size: 100%;">

        <h1>Кафедра комп'ютерної інженерії ТНЕУ</h1>

    </div>

    <div class="ui one column middle aligned very relaxed stackable grid">

        <div class="center aligned column" >


            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v3.1&appId=279243079229003&autoLogAppEvents=1';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

            <div class="fb-video" data-href="https://www.facebook.com/505980492901088/videos/994485010717298/" data-width="900" data-show-text="true"><blockquote cite="https://www.facebook.com/505980492901088/videos/994485010717298/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/505980492901088/videos/994485010717298/">Комп&#039;ютерна інженерія ТНЕУ</a><p>http://ki.tneu.edu.ua/</p>Опубліковано <a href="https://www.facebook.com/&#x41a;&#x430;&#x444;&#x435;&#x434;&#x440;&#x430;-&#x41a;&#x43e;&#x43c;&#x43f;&#x44e;&#x442;&#x435;&#x440;&#x43d;&#x43e;&#x457;-&#x406;&#x43d;&#x436;&#x435;&#x43d;&#x435;&#x440;&#x456;&#x457;-&#x422;&#x41d;&#x415;&#x423;-505980492901088/">Кафедра Комп&#039;ютерної Інженерії ТНЕУ</a> Понеділок, 6 листопад 2017 р.</blockquote></div>






        </div>

    </div>


    <div class="ui placeholder segment" style="text-align: center; background-color: #455A64;  padding-bottom: 1% ; -webkit-text-fill-color: #fff;
        font-size: 100%;">
        <div class="ui icon header">
            <i class="comment alternate icon"></i>
            Щоб дізнатись більше про умови вступу та навчання заповніть анкету абітурієнта і ми зв'яжемось з Вами
        </div>
        <div class="inline">

        </div>
    </div>


    <section id="anketa">

    <div style="text-align: center"><h3>Анкета абітурієнта</h3></div>


    <div class="ui one column middle aligned very relaxed stackable grid" style="padding: 10%">
        <div class="column">
            <label class="ui form">

                <form action="#" @submit.prevent="AddNewUser" method="POST">
                    <input type="hidden" value="{{ url('/') }}" v-model="baseUrl" />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {{ csrf_field() }}

                    <div class="field">
                        <label>Прізвище</label>
                        <div class="ui left icon input">
                            <input v-model="newUser.surname" type="text" name="surname" class="form-control" placeholder="surname"
                                   required>
                            <i class="user icon"></i>
                        </div>
                    </div>


                    <div class="field">
                        <label>Ім'я</label>
                        <div class="ui left icon input">
                            <input v-model="newUser.name" type="text" name="name" class="form-control" placeholder="name"
                                   required>
                            <i class="user icon"></i>
                        </div>
                    </div>

                    <div class="field">
                        <label>По-батькові</label>
                        <div class="ui left icon input">
                            <input v-model="newUser.fathername" type="text" name="fathername" class="form-control" placeholder="fathername"
                                   required>
                            <i class="user icon"></i>
                        </div>
                    </div>

                    <div class="field">
                        <label>Електронна пошта</label>
                        <div class="ui left icon input">
                            <input v-model="newUser.email" type="email" name="email" class="form-control" placeholder="email"
                                   required>
                            <i class="user icon"></i>
                        </div>
                    </div>


                    <div class="field">
                        <label>Телефон</label>
                        <div class="ui left icon input">
                            <input v-model="newUser.phone" type="text" name="phone" class="form-control" placeholder="phone"
                                   required>
                            <i class="user icon"></i>
                        </div>
                    </div>

                    <div class="field">
                        <label>Місто (село), школа</label>
                        <div class="ui left icon input">
                            <input v-model="newUser.location" type="text" name="location" class="form-control" placeholder="location"
                                   required>
                            <i class="user icon"></i>
                        </div>
                    </div>
                    </br>

                    <label>Як Ви дізнались про нас ?</label>
                    <div class="styled-select slate">
                        <select v-model="newUser.status" type="text" id="status" name="status">
                            <option value="1">Друзі, родичі</option>
                            <option value="2">Соц. мережі</option>
                            <option value="3">ЗМІ</option>
                        </select>
                    </div>
                </br>

                    <div class="form-group">
                        <button :disabled="!isValid" class="ui primary button" type="submit" v-if="!edit">Відправити</button>

                    </div>
                </form>
            </div>
            <div class="ui green labels" transition="success" v-if="success">
                <a class="ui label">Дані успішно відправлено. Дякуємо ! </a></div>
        </div>
    </div>
</section>

    <section id="news">

        <div class="ui three column middle aligned very relaxed stackable grid">

            <div class="center aligned column">
                <div class="ui piled segment">
                    <h4 class="ui header">CПЕЦІАЛЬНІСТЬ – КОМП’ЮТЕРНА ІНЖЕНЕРІЯ</h4>
                    <p>Фахівці з комп’ютерної інженерії діють у сферах пов’язаних з проектуванням, налаштуванням і адмініструванням комп’ютерних систем та мереж різної складності.</p>
                </div>
            </div>

            <div class="center aligned column">
                <div class="ui piled segment">
                    <h4 class="ui header">Студенти під час навчання </h4>
                    <p> отримують знання, необхідні для проектування комп’ютерних систем і мереж: технології системного програмування, мови програмування (C++, Java, PHP, Java Script, Assembler), розробки і адміністрування операційних систем (Windows, Linux); CASE-технології і системи автоматизованого проектування комп’ютерних систем і мереж, технології і інструментальні засоби розробки мікропроцесорних систем на основі сучасної елементної бази; технології проектування і адміністрування локальних і глобальних, безпровідних комп'ютерних мереж, протоколи і сервіси Internet; технології проектування і підтримки баз даних.
                        Також студенти отримують поглиблені знання з англійської мови в галузі інформаційних технологій.
                        Під час навчання студенти вивчають цикл дисциплін направлених на розробку програмного та апаратного забезпечення спеціалізованих комп’ютерних систем та пристроїв; системи зв’язку загального та промислового призначення: технології мобільного зв’язку; інформаційні технології мережі Інтернет, що забезпечують повний комплекс знань з проектування, КСМ.</p>
                </div>
            </div>
            <div class="center aligned column">
                <div class="ui piled segment">
                    <h4 class="ui header">Місце працевлаштування випускників</h4>
                    <p>у комп’ютерних фірмах, що займаються проектуванням та адмініструванням комп’ютерних систем і мереж, що надають послуги Internet, мобільного і стаціонарного зв’язку, інформаційних відділах підприємств різної форми власності, у банках.</p>
                </div>
            </div>
        </div>




    </section>

    <div class="container" style="text-align: center; background-color: #fff; padding-top: 1% ">
        <h1>
                Зворотній зв'язок
        </h1>
    </div>
    <div class="ui two column middle aligned very relaxed stackable grid">


        <div class="center aligned column" >
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

        <div class="center aligned column">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8711.410234186089!2d25.588272820383523!3d49.561394674571794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47303149c7779b31%3A0x7304b1c9df0aab7c!2z0LLRg9C70LjRhtGPINCn0LXRhdC-0LLQsCwgOA!5e0!3m2!1suk!2sua!4v1518601855561" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>
    </div>
    <div class="container" style="text-align: center">
        <p style="text-align: center;-webkit-text-fill-color: #87b2bf">
        <h4>by <a href="https://github.com/olehpitsun">Oleh Pitsun</a>
        </h4>
        </p>
    </div>
@endsection
@push('scripts')
    <script src="/js/abiturient.js"></script>
@endpush