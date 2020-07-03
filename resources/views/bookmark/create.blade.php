@extends('layouts.main')

@section('content')
    <div class="mt-4">
        <form method="POST" action="/add">
            @csrf

            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label>Ссылка на страницу</label>
                        <input type="text" class="form-control" placeholder="http://example.com" name="link">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-row">
                    <button class="btn btn-primary mr-3" type="submit">
                        Добавить
                    </button>
                    <a class="btn btn-danger" href="/">
                        Отменить
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
