@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Usuario</div>
            <div class="panel-body">
                <ul>
                    <li>Nombre: {{ $link->user->name }}</li>
                    <li>Email: {{ $link->user->email }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Requests</div>
            <div class="panel-body">
                <center>
                    <span style="font-size: 75px;">
                        {{ \ConsoleTVs\Support\Helpers::materialRound($views->count()) }}
                    </span>
                </center>
                <br />
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Visitas</div>
            <div class="panel-body">
                <center>
                    <span style="font-size: 75px;">
                        {{ \ConsoleTVs\Support\Helpers::materialRound($views->unique('ip')->count()) }}
                    </span>
                </center>
                <br />
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Navegadores</div>
            <div class="panel-body">
                {!! $browsers_chart->render() !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Sistemas Operativos</div>
            <div class="panel-body">
                {!! $os_chart->render() !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Lenguajes</div>
            <div class="panel-body">
                {!! $lang_chart->render() !!}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Requests</div>
            <div class="panel-body">
                {!! $requests_chart->render() !!}
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Visitas</div>
            <div class="panel-body">
                {!! $views_chart->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
