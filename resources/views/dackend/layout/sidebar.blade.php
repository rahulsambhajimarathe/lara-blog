  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
{{ Request::segment(2) }}
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'dashboard') collapsed @endif " href="{{url('/panel/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'category') collapsed @endif" href="{{url('panel/category/list')}}">
          <i class="bi bi-question-circle"></i>
          <span>Category</span>
        </a>
      </li><!-- End Category Page Nav -->

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'blog') collapsed @endif" href="{{url('panel/blog/list')}}">
          <i class="bi bi-question-circle"></i>
          <span>Blog</span>
        </a>
      </li><!-- End Blog Page Nav -->


      <!-- <li class="nav-item">
        <a class="nav-link " href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li> -->
      <!-- End Profile Page Nav -->


      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'help') collapsed @endif" href="{{url('panel/help/list')}}">
          <i class="bi bi-question-circle"></i>
          <span>Help</span>
        </a>
      </li><!-- End Help Page Nav -->

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'user') collapsed @endif" href={{route('user-list')}}>
          <i class="bi bi-person-fill"></i>
          <span>User</span>
        </a>
      </li><!-- End User Page Nav -->

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'inbox') collapsed @endif" href="{{url('panel/inbox/list')}}">
          <i class="bi bi-envelope"></i>
          <span>Inbox</span>
        </a>
      </li><!-- End Inbox Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->