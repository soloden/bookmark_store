@extends('layouts.main')

@section('content')
    <a href="/add" class="btn btn-primary btn-block mt-2 mb-2">Добавить закладку</a>
    @if (!empty($data))
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Favicon</th>
                <th scope="col">URL page</th>
                <th scope="col">Data created</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <th scope="row">{{ $index }}</th>
                        <td>
                            <a href="/{{ $item->id }}">{{ $item->title }}</a>
                        </td>
                        <td>
                            <img src="{{ $item->favicon }}">
                        </td>
                        <td>
                            <a href="{{ $item->url }}">{{ $item->url }}</a>
                        </td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    @endif
@endsection
