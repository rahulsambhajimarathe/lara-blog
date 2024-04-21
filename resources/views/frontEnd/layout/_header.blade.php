<div class="container-fluid bg-light position-relative shadow">
      <nav
        class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
        >
        <a
          href=""
          class="navbar-brand font-weight-bold text-secondary"
          style="font-size: 50px"
        >
          <i class="flaticon-043-teddy-bear"></i>
          <span class="text-primary">Blog</span>
        </a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse"
        >
          <div class="navbar-nav font-weight-bold mx-auto py-0">
            <a href="{{ url('') }}" class="nav-item nav-link @if(Request::segment(1) == '') active @endif">Home </a>
            @php
              $getCategoryHeader = App\Models\Category::getCategoryMenu()
            @endphp

            @foreach($getCategoryHeader as $value)
            <a href="{{ $value->slug }}" class="nav-item nav-link @if(Request::segment(1) == $value->slug) active @endif ">{{$value->name}}</a>
            @endforeach
            <!-- <a href="{{ url('about') }}" class="nav-item nav-link">About</a>
            <a href="{{ url('teams') }}" class="nav-item nav-link">Teachers</a>
            <a href="{{ url('gallery') }}" class="nav-item nav-link">Gallery</a> -->
            <a href="{{ url('blog') }}" class="nav-item nav-link @if(Request::segment(1) == 'blog') active @endif">Blog</a>
            <!-- <a href="{{ url('contact') }}" class="nav-item nav-link">Contact</a> -->
          </div>
          <!-- <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
            <div class="dropdown-menu rounded-0 m-0">
              <a href="blog.html" class="dropdown-item">Blog Grid</a>
              <a href="single.html" class="dropdown-item">Blog Detail</a>
            </div>
          </div> -->
          <a href="{{ route('login') }}" class="btn btn-primary px-4" style="margin-left:8px;">Login</a>
          <a href="{{ route('register') }}" class="btn btn-primary px-4" style="margin-left:8px;">Register</a>
        </div>
      </nav>
    </div>
