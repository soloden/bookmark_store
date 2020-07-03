@extends('layouts.main')

@section('content')
    <div>
        <h6 class="card-header d-block">Title</h6>
        <p class="my-2">{{ $data->title ?? '-' }}</p>
    </div>
    <div>
        <h6 class="card-header d-block">Keyword</h6>
        <p class="my-2">{{ $data->keyword ?? '-' }}</p>
    </div>
    <div>
        <h6 class="card-header d-block">Description</h6>
        <p class="my-2">{{ $data->description ?? '-' }}</p>
    </div>
    <div>
        <h6 class="card-header d-block">Created at</h6>
        <p class="my-2">{{ $data->created_at ?? '-' }}</p>
    </div>
    <div>
        <h6 class="card-header d-block">Favicon</h6>
        <p class="my-2">
            <img src="{{ $data->favicon ?? '' }}">
        </p>
    </div>

    <div class="mt-4 text-right">
        <a class="btn btn-danger" href="/delete/{{ $data->id }}">Удалить закладку</a>
    </div>
@endsection
