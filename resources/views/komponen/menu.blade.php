<?php
echo "Today is " . date("Y/m/d") . "<br>";
?>
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="{{ url('list-Cms') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <span class="fs-4">Simple header</span>
    </a>
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link {{ request()->is('list-cms') ? 'active' : '' }}" aria-current="page" href="{{ url('/')}}">Dashboard</a>
      </li>
      {{-- <li class="nav-item"><a href="{{url('logout')}}" class="nav-link active" aria-current="page">Home</a></li/> --}}
        <li class="nav-item"><a href="{{ url('logout') }}" class="nav-link">Logout</a></li>
    </ul>
  </header>