@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Crear Enlace</div>
            <div class="panel-body">
                <form method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="url">Link URL</label>
                        <input type="url" name="url" required class="form-control" id="url" placeholder="Link URL">
                    </div>
                    <button type="submit" class="btn btn-default">Crear Enlace</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Enlaces existentes</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>#ID</th>
                        <th>URL Original</th>
                        <th>URL Acortada</th>
                        <th>Requests</th>
                        <th>Visitas</th>
                        <th>Fecha</th>
                    </tr>
                    @foreach ($links as $link)
                        <tr>
                            <td>{{ $link->id }}</td>
                            <td>{{ $link->url }}</td>
                            <td>{{ $link->shortUrl() }}</td>
                            <td>{{ $link->views->count() }}</td>
                            <td>{{ $link->views->unique('ip')->count() }}</td>
                            <td>{{ $link->created_at->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-default" href="{{ route('statistics', $link) }}">
                                    Stadisticas
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
