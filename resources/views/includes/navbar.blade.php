<!-- Navbar     -->
<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-light">
        <a href="/" class="navbar-brand"> 
            <img src="{{url('frontend/images/logo-app.png')}}" alt="logo app sman2gp">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3"> 
                @auth
                    @if(Auth::user()->roles == "Admin")
                        <a href="{{ url('/admin') }}" class="nav-link disabled">Admin</a> |
                    @else
                        <a href="{{ url('/admin') }}" class="nav-link">Admin</a>
                        <a href="{{ url('/') }}" class="nav-link">{{Auth::user()->name}}</a> 
                    @endif
                @endauth
                </li>
                {{-- <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link">Testimonials</a>
                </li> --}}
            </ul>

            @guest
                <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0" type="button"
                    onclick="event.preventDefault(); location.href= '{{ url('login') }}';">
                        Masuk
                    </button>
                </form>

                <!-- Desktop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                    onclick="event.preventDefault(); location.href= '{{ url('login') }}';">
                        Masuk
                    </button>
                </form>
            @endguest

            @auth
                <!-- Mobile Button -->
                <div class="form-inline d-sm-block d-md-none">
                    <a href="#">
                        <button class="btn btn-login my-2 my-sm-0 delete" keluar="keluar" type="submit">
                            Keluar
                        </button>
                    </a>
                </div>

                <!-- Desktop Button -->
                <div class="form-inline my-2 my-lg-0 d-none d-md-block mr-2">
                    <a href="#">
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4 delete" keluar="keluar" type="submit">
                            Keluar
                        </button>
                    </a>
                </div>

                <!-- Desktop Button -->
                {{-- <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4 delete" keluar="keluar" type="submit">
                        Keluar
                    </button>
                </form> --}}
            @endauth

        </div>
    </nav>
</div>
@push('addon-script')
    <script>
        $('.delete').click(function(){
            var keluar = $(this).attr('keluar');
            swal({
                title: "Log out",
                text: "You will be returned to the login screen.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/logout";
                }
            });
        });
    </script>
@endpush