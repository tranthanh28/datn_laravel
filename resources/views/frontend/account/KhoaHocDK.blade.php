@extends('layouts.app')
@section('content')
@foreach($user->topics as $topic)
<div class="container">
<div class="row mt-2">
    <div class="col-4">
        <a href="/course/{{$topic->id}}"><img src="{{asset($topic->address_Pic)}}" alt="img" style="width:100px;height:100px;"></a>
    </div>
    <div class="col">
        <a href="/course/{{$topic->id}}">Chủ đề: {{$topic->NameTopic}} </a> <br>
        Giáo viên: {{$topic->teacher->nameTeacher}}<br>
    </div>
</div>
</div>
@endforeach
@endsection
