@extends('layouts.app')

@section('content')

<div class="container">
    <div class="alert alert-info">
        <h1>{{$course->NameCourse}}</h1>
        <span style="font-size: 40px;">Nội dung: {{$course->description}}</span>
    </div>
        @foreach($course->topics as $topic)
        <div class="row mt-2">
            <div class="col-4">
                <a href="course/{{$topic->id}}"><img src="{{asset($topic->address_Pic)}}" alt="img" style="width:100px;height:100px;"></a>
            </div>
            <div class="col">
                <a href="course/{{$topic->id}}">Chủ đề: {{$topic->NameTopic}} </a> <br>
                Giáo viên: {{$topic->teacher->nameTeacher}}<br>
                Học phí: {{$topic->cost}}<br>
            </div>
        </div>
        @endforeach
</div>

@endsection
