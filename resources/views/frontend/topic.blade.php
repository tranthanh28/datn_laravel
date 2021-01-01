@extends('layouts.app')

@section('content')
<div class="container">
<div class="row mt-2">
    <div class="col-sm-4" style="overflow-y:auto;">
    <img src="{{asset($topic->address_Pic)}}" alt="icondfs" style="width:200px;height:288px;"><br>
    </div>
    <div class="col-sm-8\" style="font-size: 30px">
    Chủ Đề: {{$topic->NameTopic}}<br>
    Giáo Viên: {{$topic->teacher->nameTeacher}}<br>
    Học Phí: {{$topic->cost}}<br>
    @if ($register)
    <a id="btn_dk" href="/DangKy/{{$topic->id}}" class="btn btn-danger" role="button" >Đăng ký</a>

    @endif
    </div>
    </div>
</div>
    @foreach ($topic->lessons as $lesson)
    <div><a style="font-size: 30px" href="/lesson/{{$lesson->id}}"
    @if ($register) onclick="event.preventDefault" data-toggle="modal" data-target="#exampleModal"
    @endif >Tên Bài Giảng: {{$lesson->Namelesson}}<br></a></div>
    @endforeach
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thông Báo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Khóa học chưa đăng ký!!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke</button>
        </div>
      </div>
    </div>
  </div>
@endsection
