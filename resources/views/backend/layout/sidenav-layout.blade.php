<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title></title>
    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.ico')}}" />
    <link href="{{asset('backend/assets/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/assets/css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/assets/css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/assets/css/progress.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/assets/css/toastify.min.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/assets/css/datatables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet" />

    <script src="{{asset('backend/assets/js/datatables.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/toastify-js.js')}}"></script>
    <script src="{{asset('backend/assets/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('backend/assets/js/axios.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/config.js')}}"></script>

</head>

<body>

    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    <nav class="navbar fixed-top px-0 shadow-sm bg-white">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">
                <span class="icon-nav m-0 h5" onclick="MenuBarClickHandler()">
                    <img class="nav-logo-sm mx-2" src="{{asset('backend/assets/images/menu.svg')}}" alt="logo" />
                </span>
                <img class="nav-logo  mx-2" src="{{asset('backend/assets/images/logo.png')}}" alt="logo" />
            </a>

            <div class="float-right h-auto d-flex">
                <div class="user-dropdown">
                    <img class="icon-nav-img" src="{{asset('backend/assets/images/user.webp')}}" alt="" />
                    <div class="user-dropdown-content ">
                        <div class="mt-4 text-center">
                            <img class="icon-nav-img" src="{{asset('backend/assets/images/user.webp')}}" alt="" />
                            <h6>User Name</h6>
                            <hr class="user-dropdown-divider  p-0" />
                        </div>
                        <a href="{{route('profile')}}" class="side-bar-item">
                            <span class="side-bar-item-caption">Profile</span>
                        </a>
                        <a href="{{route('logout')}}" class="side-bar-item">
                            <span class="side-bar-item-caption">Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div id="sideNavRef" class="side-nav-open">
        <ul class="side-bar-menu">
            <li class="side-bar-item">
                <a href="{{route('dashboard')}}">
                    <i class="fas fa-tachometer-alt"></i><span class="side-bar-item-caption text-lg">Dashboard</span>
                </a>
            </li>
            <li class="side-bar-item has-submenu">
                <a href="#">
                    <i class="fas fa-home"></i><span class="side-bar-item-caption text-lg">Home</span>
                </a>
                <ul class="submenu">
                    <li class="sub_menu_li"><a href="{{route('hero.page')}}"><i class="fas fa-angle-right"></i><span class="">Hero</span></a></li>
                    <li class="sub_menu_li"><a href="{{route('about.page')}}"><i class="fas fa-angle-right"></i><span class="">About</span></a></li>
                    <li class="sub_menu_li"><a href="#"><i class="fas fa-angle-right"></i><span class="">Social</span></a></li>
                </ul>
            </li>

            {{-- resume --}}
            <li class="side-bar-item has-submenu">
                <a href="#">
                    <i class="fas fa-home"></i><span class="side-bar-item-caption text-lg">Resume</span>
                </a>
                <ul class="submenu">
                    <li class="sub_menu_li"><a href="#"><i class="fas fa-angle-right"></i><span class="">Experience</span></a></li>
                    <li class="sub_menu_li"><a href="#"><i class="fas fa-angle-right"></i><span class="">Education</span></a></li>
                    <li class="sub_menu_li"><a href="#"><i class="fas fa-angle-right"></i><span class="">Professional Skills</span></a></li>
                    <li class="sub_menu_li"><a href="#"><i class="fas fa-angle-right"></i><span class="">Languages</span></a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div id="contentRef" class="content main_body">
        @yield('content')
    </div>


    <script>
        function MenuBarClickHandler() {
        let sideNav = document.getElementById('sideNavRef');
        let content = document.getElementById('contentRef');
        if (sideNav.classList.contains("side-nav-open")) {
            sideNav.classList.add("side-nav-close");
            sideNav.classList.remove("side-nav-open");
            content.classList.add("content-expand");
            content.classList.remove("content");
        } else {
            sideNav.classList.remove("side-nav-close");
            sideNav.classList.add("side-nav-open");
            content.classList.remove("content-expand");
            content.classList.add("content");
        }
    }
    // =====sidebar menu
        const itemsWithSubmenu = document.querySelectorAll(".has-submenu");

        itemsWithSubmenu.forEach((item) => {
            item.addEventListener("click", () => {
                const submenu = item.querySelector(".submenu");
                submenu.classList.toggle("show");
            });
        });


    </script>

</body>

</html>
