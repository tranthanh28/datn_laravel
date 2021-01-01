@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chage Password</div>
               <div>
                @if (session('success'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
            @endif
            @if (session('error1'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{session('error1')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('updateMK') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="oldpass" class="col-md-4 col-form-label text-md-right">Old password</label>

                            <div class="col-md-6">
                                <input id="oldpass" type="password" class="form-control @error('oldpass') is-invalid @enderror" name="oldpass" value="" required autofocus>

                                @error('oldpass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newpass" class="col-md-4 col-form-label text-md-right">New password:</label>

                            <div class="col-md-6">
                                <input id="newpass" type="password" class="form-control @error('newpass') is-invalid @enderror" name="newpass" value="{{ old('newpass') }}" required autocomplete="newpass">

                                @error('newpass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="confirm_pass" class="col-md-4 col-form-label text-md-right">Confirm password:</label>

                            <div class="col-md-6">
                                <input id="confirm_pass" type="password" class="form-control @error('confirm_pass') is-invalid @enderror" name="confirm_pass" required autocomplete="new-password">

                                @error('confirm_pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
