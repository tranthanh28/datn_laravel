@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-8 bg-dark" style="height: 400px;">
        <iframe width="100%" height="400px" src="https://www.youtube.com/embed/WStokAlK49I" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      {{-- phan binh luan --}}
      <div class="col-sm-4 border" style="position: relative;height: 400px;">
        <div style="height: 350px; width: 100%;  overflow-y: auto;">
            @forelse ($lesson->comments as $comment)
            <p>{{ $comment->user->name }} {{$comment->created_at}}</p>
            <p>{{ $comment->content }}</p>
            <hr>
          @empty
            <p>No comments</p>
          @endforelse
        </div>
        <div style="position: absolute;bottom: 0; width: 90%;">
          <form class="form-inline" method="post" action="{{ route('comments.store') }}" style="width: 100%;">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="content" placeholder="Bình luận"></textarea>
                <input type=hidden name=lesson_id value="{{ $lesson->id }}" />
            </div>
            <div class="form-group">
                <input type=submit class="btn btn-success" value="Add Comment" />
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  @foreach ($lesson->topic->lessons as $item)
  <div><a href="/lesson/{{$item->id}}">Tên bài giảng: {{$item->Namelesson}}<br></a></div>
  @endforeach


@endsection
