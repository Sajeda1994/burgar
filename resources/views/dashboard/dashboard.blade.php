<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>Admin Dashboard</title>
  <!-- Simple bar CSS -->
  @include('dashboard/style')


</head>

<body class="vertical  dark {{App::islocale('ar') ? 'rtl' : ''}}">

  @include('sweetalert::alert')

  <div class="wrapper">
    <nav class="topnav navbar navbar-light">
      <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
      </button>
      <form class="form-inline mr-auto searchform text-muted">
        <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search"
          placeholder="Type something..." aria-label="Search">
      </form>
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
            <i class="fe fe-sun fe-16"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
            <span class="fe fe-grid fe-16"></span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-muted my-2" href="#" data-toggle="collapse"
            data-target="#lang">{{__('trans.Languages')}}</a>
          <ul class="collapse" id="lang" style="list-style:none">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
        <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}"
          href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
          {{ $properties['native'] }}
        </a>
        </li>
      @endforeach
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="avatar avatar-sm mt-2">

            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/profile">{{__('trans.Profile')}}</a>
            <a class="dropdown-item" href="/setting">{{__('trans.Settings')}}</a>
          </div>
        </li>
      </ul>
    </nav>
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
      <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
      </a>
      <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->

        <ul class="navbar-nav flex-fill w-100 mb-2">
          <li class="nav-item dropdown">
            <a href="/admindash" aria-expanded="false" class=" nav-link">
              <i class="fe fe-home fe-16">
                <h6>{{__('trans.Dashboard')}}</h6>
              </i>
            </a>

          </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
          <span>Components</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
          <li class="nav-item dropdown">
            <a href="{{route('category.index')}}" aria-expanded="false" class="nav-link">
              <i class="fe fe-box fe-16"></i>
              <span class="ml-3 item-text">{{__('trans.Categorys')}}</span>
            </a>

          </li>
          <li class="nav-item w-100">
            <a class="nav-link" href="{{route('meal.index')}}">
              <i class="fe fe-layers fe-16"></i>
              <span class="ml-3 item-text">{{__('trans.Meals')}}</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="{{route('appetizers.index')}}" aria-expanded="false" class="nav-link">
              <i class="fe fe-grid fe-16"></i>
              <span class="ml-3 item-text">{{__('trans.Appetizers')}}</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="{{route('drink.index')}}"  aria-expanded="false" class=" nav-link">
              <i class="fe fe-credit-card fe-16"></i>
              <span class="ml-3 item-text">{{__('trans.Drinks')}}</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="{{route('table.index')}}"  aria-expanded="false" class="nav-link">
              <i class="fe fe-pie-chart fe-16"></i>
              <span class="ml-3 item-text">{{__('trans.Tables')}}</span>
            </a>

          </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
          <span>Apps</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
          <li class="nav-item w-100">
            <a class="nav-link" href="calendar.html">
              <i class="fe fe-calendar fe-16"></i>
              <span class="ml-3 item-text">Calendar</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-book fe-16"></i>
              <span class="ml-3 item-text">Contacts</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="contact">
              <a class="nav-link pl-3" href="./contacts-list.html"><span class="ml-1">Contact List</span></a>
              <a class="nav-link pl-3" href="./contacts-grid.html"><span class="ml-1">Contact Grid</span></a>
              <a class="nav-link pl-3" href="./contacts-new.html"><span class="ml-1">New Contact</span></a>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-user fe-16"></i>
              <span class="ml-3 item-text">Profile</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="profile">
              <a class="nav-link pl-3" href="./profile.html"><span class="ml-1">Overview</span></a>
              <a class="nav-link pl-3" href="./profile-settings.html"><span class="ml-1">Settings</span></a>
              <a class="nav-link pl-3" href="./profile-security.html"><span class="ml-1">Security</span></a>
              <a class="nav-link pl-3" href="./profile-notification.html"><span class="ml-1">Notifications</span></a>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#fileman" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-folder fe-16"></i>
              <span class="ml-3 item-text">File Manager</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="fileman">
              <a class="nav-link pl-3" href="./files-list.html"><span class="ml-1">Files List</span></a>
              <a class="nav-link pl-3" href="./files-grid.html"><span class="ml-1">Files Grid</span></a>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#support" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-compass fe-16"></i>
              <span class="ml-3 item-text">Help Desk</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="support">
              <a class="nav-link pl-3" href="./support-center.html"><span class="ml-1">Home</span></a>
              <a class="nav-link pl-3" href="./support-tickets.html"><span class="ml-1">Tickets</span></a>
              <a class="nav-link pl-3" href="./support-ticket-detail.html"><span class="ml-1">Ticket Detail</span></a>
              <a class="nav-link pl-3" href="./support-faqs.html"><span class="ml-1">FAQs</span></a>
            </ul>
          </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
          <span>Extra</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
          <li class="nav-item dropdown">
            <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-file fe-16"></i>
              <span class="ml-3 item-text">Pages</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100 w-100" id="pages">
              <li class="nav-item">
                <a class="nav-link pl-3" href="./page-orders.html">
                  <span class="ml-1 item-text">Orders</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="./page-timeline.html">
                  <span class="ml-1 item-text">Timeline</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="./page-invoice.html">
                  <span class="ml-1 item-text">Invoice</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="./page-404.html">
                  <span class="ml-1 item-text">Page 404</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="./page-500.html">
                  <span class="ml-1 item-text">Page 500</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="./page-blank.html">
                  <span class="ml-1 item-text">Blank</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#auth" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-shield fe-16"></i>
              <span class="ml-3 item-text">Authentication</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="auth">
              <a class="nav-link pl-3" href="./auth-login.html"><span class="ml-1">Login 1</span></a>
              <a class="nav-link pl-3" href="./auth-login-half.html"><span class="ml-1">Login 2</span></a>
              <a class="nav-link pl-3" href="./auth-register.html"><span class="ml-1">Register</span></a>
              <a class="nav-link pl-3" href="./auth-resetpw.html"><span class="ml-1">Reset Password</span></a>
              <a class="nav-link pl-3" href="./auth-confirm.html"><span class="ml-1">Confirm Password</span></a>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#layouts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-layout fe-16"></i>
              <span class="ml-3 item-text">Layout</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="layouts">
              <li class="nav-item">
                <a class="nav-link pl-3" href="./index.html"><span class="ml-1 item-text">Default</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="./index-horizontal.html"><span class="ml-1 item-text">Top
                    Navigation</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="./index-boxed.html"><span class="ml-1 item-text">Boxed</span></a>
              </li>
            </ul>
          </li>
        </ul>


      </nav>
    </aside>

    <!--End aside-->



    <main role="main" class="main-content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="row align-items-center mb-2">
              <div class="col">
                <h2 class="h5 page-title text-center">{{__('trans.Welcome Admin!')}}</h2>
              </div>
              <div class="col-auto">

              </div>
            </div>
            <div class="row">


              @yield('dashbody')

            </div>
            <!-- .row-->
          </div> <!-- .col-12 -->
        </div> <!-- .row -->
      </div> <!-- .container-fluid -->

    </main> <!-- main -->
  </div> <!-- .wrapper -->
  @include('dashboard/script')
</body>

</html>