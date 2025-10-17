@extends('layouts.app')

@section('title', 'Danh sách Tin tức')

@section('content')
  <h1>Danh sách Tin tức</h1>
  @foreach($news as $item)
    <div>
      <a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>
      <p>{{ Str::limit($item->summary, 100) }}</p>
    </div>
  @endforeach

  {{ $news->links() }}
@endsection
