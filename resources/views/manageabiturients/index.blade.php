{{Session::get('message') }}
@extends('layouts.master')

@section('content')


    <div class="row">

        <div class="ui form">



            <form action="/sendmail" method="post">
                {{csrf_field()}}

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif

                <div class="field">
                    <label>Відправити листа</label>
                    <div class="ui left icon input">
                        <input type="text" name="title" class="form-control" placeholder="Заголовок"
                               required>
                        <i class="user icon"></i>
                    </div>
                    <div class="ui left icon input">
                        <textarea  name="text" class="form-control" placeholder="Текст"
                                   required ></textarea>

                    </div>
                    <div class="ui left icon input">
                        <input type="text" name="sendto" class="form-control" placeholder="example@example.com"
                               required>
                        <i class="user icon"></i>
                    </div>
                </div>

                <div class="center aligned column">
                    <button class="ui blue button" type="submit" value="Login" >Надіслати</button>
                </div>
            </form>


        </div>

        <div class="panel panel-default">
            <div style="text-align: center"><h2>Список абітурієнтів</h2></div>



            <table class="ui striped table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Прізвище</th>
                        <th>Ім'я</th>
                        <th>По батькові</th>
                        <th>Email</th>
                        <th>Інформація від</th>
                        <th>Рейтинг</th>
                        <th>created_at</th>
                        <th>manage</th>
                    </tr>
                </thead>
                    <tbody>
                        @forelse($abiturients as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->fathername}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <?php if($user->status == 1){ ?>
                                    <i class="users icon"></i>
                                    Друзі, родичі
                                <?php    }?>

                                    <?php if($user->status == 2){ ?>
                                    <i class="facebook square icon"></i>
                                    Соц. мережі
                                    <?php    }?>
                                    <?php if($user->status == 3){ ?>
                                    <i class="tv icon"></i>
                                    ЗМІ
                                    <?php    }?>

                            </td>
                            <td><i class="empty star icon"></i>

                                <form action="/manageabiturients/{{$user->id}}" method="GET" class="pull-right" >
                                    {{ csrf_field() }}
                                    {{ method_field('STATUS') }}
                                    <button class="ui blue button">
                                        +
                                    </button>
                                    {{$user->rating}}
                                </form>
                            </td>
                            <td>{{$user->created_at}}</td>
                            <td>

                                <form action="/manageabiturients/{{$user->id}}" method="POST" class="pull-right" >
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="ui red button">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @empty
                            No users
                        @endforelse
                    </tbody>
                </table>
            </div>
        <div class="col-md-4 col-md-offset-4">
            {{$abiturients->links()}}
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/js/abiturient.js"></script>


@endpush
