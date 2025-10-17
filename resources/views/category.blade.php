<!-- resources/views/category.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $category->name }}</h3>
    <div class="row">
        @foreach($newsItems as $news)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $news->title }}</h5>
                        <p class="card-text">Slug: {{ $news->slug }}</p>
                        <a href="{{ route('news.show', $news->slug) }}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
