@extends('layouts.app')
@section('content')
<div class="container">
    <div class="alert alert-success">
        Tài khoản: {{$user->name}}<br>
        Số dư: {{$user->wallet}}<br>
        Họ tên: {{$user->FullName}}<br>
        Tỉnh thành: {{$user->address}}<br>
        Ngày tham gia: {{$user->created_at}}<br>
        Số điện thoại: {{$user->phont}}<br>
        Email: {{$user->email}}<br>
    </div>
    <a href="{{route('SuaTT')}}" class="btn btn-primary" role="button">Sửa Thông Tin</a>
</div>
@endsection
