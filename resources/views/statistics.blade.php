@extends('layouts.app')

@section('content')
<div class="row">
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
