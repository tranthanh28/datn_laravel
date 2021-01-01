
@extends('layouts.app')
@section('content')
@if ($nap)
<div class="alert alert-danger text-center " style ="display: flex; flex-wrap: nowrap; justify-content: center; align-items: center; height:350px;\">
    <div style ="text-align: center; font-size: 30px;">Đăng ký khóa học không thành công.<br>
    Tài khoản không đủ để đăng ký.Vui lòng nạp tiền vào để đăng ký khóa học</div></div>
    <div style="text-align: center;">
    <a href="{{route('NapTien')}}" class="btn btn-danger" role="button">Nạp tiền</a>
</div>
@else
<div class="alert alert-success text-center" style ="padding-top: 150px; height:350px; font-size: 30px;">Đăng ký khóa học thành công</div>
@endif



@endsection
