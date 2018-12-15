{{Session::get('message') }}
<script src="https://unpkg.com/vue"></script>

@extends('layouts.master')

@section('content')


    <div class="container" style="text-align: center; background-color: #87b2bf;  padding-bottom: 1% ; -webkit-text-fill-color: #fff;
        font-size: 100%;">

        <h1></h1>

    </div>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {

            $( "#datepicker" ).datepicker({
                dateFormat: "yy-mm-dd"
            }) ;
        } );


    </script>

    <div class="ui one column middle aligned very relaxed stackable grid" style="padding: 10%">
        <div class="column">
            <label class="ui form">
                <form action="/randomize" method="post">
                    {{csrf_field()}}

                    <div class="field">
                        <p>Дата: <input type="text" name="datepicker" id="datepicker" class="form-control" required></p>
                    </div>

                    <div class="center aligned column">
                        <input type="submit" value="Генерувати" class="ui primary button">
                    </div>
                </form>

            </label>
        </div>
    </div>


    <script>
        $( function() {
            $(".text").datepicker({
                dateFormat: "yy-mm-dd"
            })
        });
    </script>

    @forelse($abiturients as $a)

        <h2 style="text-align: center; -webkit-text-fill-color: green">{{$a}}</h2>
    @empty
        <h2 style="-webkit-text-fill-color: #ff3f49; text-align: center">Записів не знайдено</h2>
    @endforelse


    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>




@endsection
@push('scripts')
    <script src="/js/abiturient.js"></script>
@endpush