{{Session::get('message') }}

@extends('layouts.master')
@section('content')

    <div>
        <h1>
            Рейтинг викладачів кафедри комп'ютерної інженерії
        </h1>
    </div>

    <section id="search">
        <div class="ui stackable grid" style="text-align: center; padding: 1%;" >
            <div class="eight wide column" >
                <h2 class="ui header">
                    <img class="ui image" src="/images/icons/search_file-512.png ">
                    <div class="content">
                        Наукометрична база:
                    </div>
                </h2>
            </div>

            <div class="eight wide column" style="">
                <form class="ui form" role="form" method="POST" action="/">
                    {{ csrf_field() }}
                    <div class="form-group-sm">

                        <div class="col-md-6">
                            <select name="smbase" class="ui fluid dropdown">
                                <option value="scholar_h_index" >Scholar</option>
                                <option value="scopus_h_index" >Scopus</option>
                            </select>
                        </div>
                        <input type="submit" class="ui black basic button">

                    </div>
                </form>
            </div>
        </div>
</section>
    <section id="teacherList" style="padding: 1%" >
        <div class="container">
            <table class="ui very basic  celled table">
                <thead>
                    <tr>
                        <th>Викладач</th>
                        <th>Scholar</th>
                        <th>Scopus</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($teachersInfo as $teacher)
                    <tr>
                        <td>
                            <h4 class="ui image header">
                                <img src="/images/participants/{{$teacher->image}}" class="ui mini rounded image">
                                <div class="content">
                                    {{$teacher->fullname}}
                                    <div class="sub header">кафедра КІ
                                    </div>
                                </div>
                            </h4></td>
                        <td>
                            {{$teacher->scholar_h_index}}
                        </td>
                        <td>
                            {{$teacher->scopus_h_index}}
                        </td>
                    </tr>
                @empty
                    No info
                @endforelse
                </tbody>
            </table>
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
                    <a class="ui label">Дані успішно відправлено. Дякуємо ! </a>
                </div>
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