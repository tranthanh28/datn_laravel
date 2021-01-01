@extends('layouts.app')
@section('content')
<form action="{{route('Suathongtin')}}"   method="post">
    @csrf
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" style="width: 200px;">Địa chỉ</span>
      </div>
      <input type="text" class="form-control" name="diachi" value="{{$user->address}}">
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"style="width: 200px;">Họ tên</span>
      </div>
      <input type="text" class="form-control" name="hoten" value="{{$user->FullName}}" >
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"style="width: 200px;">Số điện thoại</span>
      </div>
      <input type="text" class="form-control" name="sdt" value="{{$user->phone}}">
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"style="width: 200px;">Email</span>
      </div>
      <input type="email" class="form-control" name="email" value="{{$user->email}}">
    </div>
    <div></div>
    <div style="text-align:center;"><button type="submit" class="btn btn-primary" >Sửa</button></div>


  </form>
@endsection
