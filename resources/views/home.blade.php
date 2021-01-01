@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('/img/11.png') }}" alt="E-learning" width="1100"
                            height="500">
                        <div class="carousel-caption">
                            <h3>E-learning</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/img/15.jpg') }}" alt="E-learning" width="1100"
                            height="500">
                        <div class="carousel-caption">
                            <h3>E-learning</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/img/16.jpg') }}" alt="E-learning" width="1100"
                            height="500">
                        <div class="carousel-caption">
                            <h3>E-learning</h3>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="400"
                data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a
                        href="https://www.facebook.com/facebook">Facebook</a></blockquote>
            </div>
            <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="400"
                data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a
                        href="https://www.facebook.com/facebook">Facebook</a></blockquote>
            </div>
        </div>
    </div>

</div>
<div class="container">
<div class="row">
    @foreach($courses as $course)
    <div class="card border-secondary mt-4 col-sm-6">
        <div class="card-header">        <a href="{{$course->id}}">
            <h5><strong> {{$course->NameCourse}} </strong></h5><br>
        </a></div>
        <div class="card-body text-secondary">
          <p class="card-text">        @foreach($course->topics as $topic)
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
            @endforeach</p>
        </div>
      </div>
    @endforeach
</div>
</div>
@endsection
