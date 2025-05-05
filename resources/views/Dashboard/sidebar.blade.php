<ul class="navbar-nav  sidebar sidebar-dark accordion" style="background-color: #4CAF50" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('img/Character.png') }}" alt="User" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">

        </div>
        <img src="{{ asset('img/Group 13 (1).png') }}" alt="User" style="width: 140px; ">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('index.dataUser')}}">
            <i class="fa-solid fa-users"></i>
            <span>Dashboard User</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('index.categories')}}">
            <i class="fa-solid fa-list"></i>
            <span>Dashboard Kategori</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('index.artikel')}}">
            <i class="fa-regular fa-newspaper"></i>
            <span>Dashboard Artikel</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('index.craft')}}">
            <i class="fa-solid fa-pen-ruler"></i>
            <span>Dashboard Tutorial Craft</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('index.filter')}}">
            <i class="fa-solid fa-filter"></i>
            <span>Dashboard Filter</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



</ul>