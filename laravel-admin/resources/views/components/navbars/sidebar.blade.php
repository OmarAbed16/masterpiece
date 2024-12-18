@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <img style="border-radius:50%;" src="{{ asset('assets/img/logos/icon.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white">Gasy - Dashboard</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Profiles</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('MyProfile.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">My Profile</span>
                </a>
            </li>

            


            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'user-management' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('users.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Users Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'tables' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('drivers.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1rem;" class="ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Drivers Profile</span>
                </a>
            </li>

            
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'orders' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('orders.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Orders</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'reviews' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('reviews.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">reviews</i>
                    </div>
                    <span class="nav-link-text ms-1">Reviews</span>
                </a>
            </li>
      
           
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        
        
        <div class="mx-3">
            <div class="btn bg-gradient-primary w-100"
                >{{ auth()->user()->name }} - {{ auth()->user()->role }}<br>{{ auth()->user()->email }}</div>
        </div>
    </div>
</aside>
