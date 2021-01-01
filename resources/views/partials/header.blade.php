
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0&appId=851417032320247&autoLogAppEvents=1"
    nonce="hRF5Abrq"></script>
<div class="jumbotron jumbotron-fluid p-3">
    <div class="row ">
        <div class="col-sm">
            <a href="{{ route('home') }}"><img src="{{asset('/img/logo.png')}}" height="100px" title="học trực tuyến" alt="Học trực tuyến"></a><br>
            <div class="fb-like" data-href="http://localhost/test/ht1.php" data-width="" data-layout="button_count"
                data-action="like" data-size="small" data-share="false"></div>
        </div>
        <form method="get" action="{{ route('search.result') }}" class="form-inline col-sm">
            @csrf
            <input type="text" name="query" class="form-control mr-sm-2"  placeholder="Search" >
            <button class="btn btn-success" type="submit"><i class="fas fa-search"></i>Search</button>
        </form>
        <div class="col-sm">
            @guest
            <div id="dangnhap1">
                <a href="{{ route('register') }}" class="btn btn-info" role="button">Đăng ký</a>
                <a href="{{ route('login') }}" class="btn btn-primary d-sm-inline" role="button">Đăng nhập</a>
            </div>
            @else
            <div class="dropdown" id="dangnhap2">
                <span class=" dropdown-toggle" style="cursor:pointer; font-size:20px;" data-toggle="dropdown"><i
                        class=" fas fa-user-alt"></i>
                        {{ Auth::user()->name }}</span><br>
                <a href="{{ route('PhongHop') }}" class="btn btn-success" role="button">Phòng họp</a>
                <div class="dropdown-menu" style="position: relative; z-index:2; ">
                    <a class="dropdown-item" href="{{ route('TTTK') }}">Thông tin tài khoản</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('DoiMK') }}">Đổi mật khẩu</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('KhoaHocDK') }}">Khóa học đã đăng ký</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('NapTien') }}">Nạp tiền</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">Đăng xuất</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            @endguest
        </div>
    </div>
</div>
<nav id="menu1" class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" style=" z-index:1; ">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}" ><i class="fas fa-house-user"></i>Trang chủ</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/1">Lớp 10</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/5">Lớp 11</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/6">Lớp 12</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/7">Tiếng Anh</a>
        </li>
    </ul>
</nav>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="{{ route('home') }}"><i class="fas fa-house-user"></i>Trang chủ</a>
    <a href="/1">Lớp 10</a>
    <a href="/5">Lớp 11</a>
    <a href="/6">Lớp 12</a>
    <a href="/7">Tiếng Anh</a>
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <span style="color:white; font-size:30px;cursor:pointer" id="menu" onclick="openNav()"><i class=" fas fa-list-ul">
        </i> Menu</span>
</nav>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
