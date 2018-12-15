@extends('layouts.master')

@section('content')

<div class="register" style="margin: 3%">
    <div class="ui two column middle aligned very relaxed stackable grid">
        <div class="column">
            <div class="ui form">



                <form action="/manageusers" method="post">
                    {{csrf_field()}}

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @endif

                    <div class="field">
                        <label>Username</label>
                        <div class="ui left icon input">
                            <i class="fa fa-envelope"></i>

                            <input type="email" name="email" class="form-control" placeholder="example@example.com"
                                   required>
                        </div>
                    </div>




                    <div class="field">
                        <label>First Name</label>
                        <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name"
                               required>
                    </div>


                    <div class="field">
                        <label>Last Name</label>
                        <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                               required>
                    </div>



                    <div class="field">
                        <label>password</label>
                        <span class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </span>
                        <input type="password" name="password" class="form-control" placeholder="password"
                               required>
                    </div>
                    <div class="field">
                        <label>password</label>
                        <span class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </span>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="password_confirmation"
                               required>
                    </div>

                    <div class="center aligned column">
                        <input type="submit" value="Register" >
                    </div>
                </form>


            </div>
        </div>
        <div class="ui vertical divider">
            Or
        </div>
        <div class="center aligned column">
            <a href="/login">
                <div class="ui big green labeled icon button">
                    <i class="signup icon"></i>
                    Увійти
                </div>
            </a>
        </div>
    </div>

</div>




    @endsection