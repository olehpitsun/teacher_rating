{{Session::get('message') }}
@extends('layouts.master')

@section('content')
<div style="padding: 1%">
    <div class="ui big breadcrumb">
        <a href="/earnings" class="section">Home</a>
        <i class="right chevron icon divider"></i>
        <div class="active section">Список викладачів </div>
    </div>

        <table class="ui compact celled definition table">
            <thead>
            <tr>
                <th></th>
                <th>Піб</th>
                <th>Scholar url</th>
                <th>Scopus url</th>
                <th>manage</th>
            </tr>
            </thead>
            <tbody>
            @forelse($teachers as $teacher)
                <tr>
                    <td class="collapsing">
                        <div class="ui fitted slider checkbox">
                            <input type="checkbox"> <label></label>
                        </div>
                    </td>
                    <td>{{$teacher->fullname}}</td>
                    <td>{{$teacher->scholar_href}}</td>
                    <td>{{$teacher->scopus_href}}</td>
                    <td><a href="/manageteachers/{{$teacher->id}}/edit" class="ui yellow button"> Edit   </a>
                        <form action="/manageteachers/{{$teacher->id}}" method="POST" class="pull-right">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="ui red button">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                No info
            @endforelse
            </tbody>

            <tfoot class="full-width">
            <tr>
                <th></th>
                <th colspan="4">
                    <div class="ui right floated small primary labeled icon button">

                        <i class="user icon"></i>
                        <a href="/manageteachers/create" >
                            <p style="-webkit-text-fill-color: #fff">Додати викладача</p>
                        </a>
                    </div>
                    <div class="ui small button">
                        Approve
                    </div>
                    <div class="ui small  disabled button">
                        Approve All
                    </div>
                </th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
