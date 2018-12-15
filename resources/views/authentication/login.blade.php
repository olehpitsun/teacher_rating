@extends('layouts.master')

@section('content')

<div class="login" style="margin-bottom: 20%; padding-left: 2%">
    <div class="ui two column middle aligned very relaxed stackable grid">
        <div class="column">
            <div class="ui form">



                <form action="/login" method="post">
                    {{csrf_field()}}

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @endif

                    <div class="field">
                        <label>Username</label>
                        <div class="ui left icon input">
                            <input type="email" name="email" class="form-control" placeholder="example@example.com"
                                   required>
                            <i class="user icon"></i>
                        </div>
                    </div>




                    <div class="field">
                        <label>Password</label>

                        <input type="password" name="password" class="form-control" placeholder="password"
                                   required>
                    </div>

                    <a href="/forgot-password">
                        Forgot your password
                    </a>

                    <div class="center aligned column">
                        <button class="ui blue button" type="submit" value="Login" >Увійти</button>
                    </div>
                </form>


            </div>
        </div>
        <div class="ui vertical divider">
            Or
        </div>
        <div class="center aligned column">
            <a href="/register">
                <div class="ui big green labeled icon button">
                    <i class="signup icon"></i>
                    Register
                </div>
            </a>
        </div>
    </div>
</div>


        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
@endsection
